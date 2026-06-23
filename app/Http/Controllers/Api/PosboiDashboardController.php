<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\userDetailResource;
use App\Http\Resources\Order\OrderResource;
use App\Models\User;
use App\Models\Order;
use App\Services\Actions\Facades\OrderActionFacade as OrderAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PosboiDashboardController extends Controller
{
    /**
     * Dashboard data: user profile, locations (from pos/locations), recent 5 orders.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dashboard(Request $request)
    {
        $user = auth()->guard('api')->user();
        if (! $user) {
            return $this->response([], 401, __('Unauthenticated.'));
        }

        $userId = $user->id;

        // 1. User details (same as user/profile)
        $profileResponse = $this->checkExistence($userId, 'users');
        $userData = null;
        if ($profileResponse['status']) {
            $userData = new userDetailResource(User::getAll()->where('id', $userId)->first());
        }

        // 2. Locations (from existing pos/locations API – internal call to keep response shape consistent)
        $locations = $this->getLocations($request);
        $vendorId = $user->vendor()?->vendor_id;

        // 3. Recent 5 orders (only orders that have order details for this user's vendor)
        $recentOrdersQuery = Order::with(OrderAction::relationsWith());

        if ($vendorId !== null) {
            $recentOrdersQuery->whereHas('orderDetails', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            });
        }

        $recentOrders = $recentOrdersQuery->orderBy('created_at', 'desc')->limit(5)->get();

        return $this->response([
            'user' => $userData,
            'locations' => $locations,
            'recent_orders' => OrderResource::collection($recentOrders),
        ]);
    }

    /**
     * Get locations (same data as pos/locations API).
     * Tries the app's pos/locations endpoint first; falls back to Inventory locations for the user's vendor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getLocations(Request $request)
    {
        $baseUrl = $request->getSchemeAndHttpHost();

        try {
            $response = Http::withToken($request->bearerToken())
                ->timeout(5)
                ->get($baseUrl . '/api/pos/locations');

            if ($response->successful()) {
                $body = $response->json();
                return $body['response']['data'] ?? $body['data'] ?? $body ?? [];
            }
        } catch (\Throwable $e) {
            // pos/locations not available – try fallback
        }

        // Fallback: Inventory locations for the authenticated user's vendor
        if (isActive('Inventory') && auth()->guard('api')->user()->vendorUser?->vendor_id) {
            $vendorId = auth()->guard('api')->user()->vendorUser->vendor_id;
            $locations = \Modules\Inventory\Entities\Location::where('vendor_id', $vendorId)
                ->active()
                ->get(['id', 'vendor_id', 'name', 'slug', 'address', 'phone', 'email', 'status', 'is_default']);

            return $locations->toArray();
        }

        return [];
    }
}
