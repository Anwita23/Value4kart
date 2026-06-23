<?php

/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 *
 * @created 19-01-2022
 */

namespace App\Http\Controllers\Site;

use App\Enums\ProductChannel;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Modules\CMS\Service\HomepageService;

class SellerController extends Controller
{
    /**
     * Shop
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index($alias = null)
    {
        $data['shop'] = \Modules\Shop\Http\Models\Shop::firstWhere('alias', $alias);

        if (is_null($alias) || ! isActive('Shop') || empty($data['shop']) || ! Vendor::isVendorExist($data['shop']->vendor_id)
            || (request('homepage') && (! auth()->user() || (! isSuperAdmin())
            || (auth()->user()->role()->type == 'vendor' && auth()->user()->vendor()->vendor_id != $data['shop']->vendor_id)))) {
            abort(404);
        }

        $shop = $data['shop'];
        $data['allProducts'] = Product::where('vendor_id', $shop->vendor_id)
            ->whereJsonContains('channels', ProductChannel::$Store)
            ->notVariation()
            ->paginate(25);
        $data['displayPrice'] = preference('display_price_in_shop');
        $data['topSellerIds'] = Vendor::topSeller()->pluck('vendor_id')->toArray();
        $data['vendor'] = Vendor::with('reviews', 'shops')->where('id', $shop->vendor_id)->first();
        $data['reviewCount'] = $data['vendor']->reviews->where('status', 'Active')->count();
        $data['avg'] = $data['vendor']->reviews->where('status', 'Active')->avg('rating');
        $data['positiveRating'] = Product::positiveRating($shop->vendor_id);
        $data['vendorPage'] = (new HomepageService)->home($shop->vendor_id);
        $data['homeService'] = new HomepageService;

        return view('site.shop.index', $data);
    }

    public function vendorProfile($alias = null)
    {
        $data['shop'] = \Modules\Shop\Http\Models\Shop::firstWhere('alias', $alias);

        if (is_null($alias) || ! isActive('Shop') || empty($data['shop']) || ! Vendor::isVendorExist($data['shop']->vendor_id)) {
            abort(404);
        }

        $shop = $data['shop'];
        $data['vendor'] = Vendor::with('reviews', 'shops')->where('id', $shop->vendor_id)->first();
        $data['reviewCount'] = $data['vendor']->reviews->where('status', 'Active')->count();
        $data['avg'] = $data['vendor']->reviews->where('status', 'Active')->avg('rating');
        $data['positiveRating'] = Product::positiveRating($shop->vendor_id);
        $data['reviews'] = $data['vendor']->reviews()->where('reviews.status', 'Active')->orderBy('created_at', 'desc')->with('user')->paginate(5);
        $data['progessBarRating'] = $data['vendor']->reviews()->where('reviews.status', 'Active')->select(\DB::raw('count("rating") as total_rating, rating'))->groupBy('rating')->orderBy('rating', 'desc')->get()->toArray();
        $data['topSellerIds'] = Vendor::topSeller()->pluck('vendor_id')->toArray();
        $data['vendorPage'] = (new HomepageService)->home($shop->vendor_id);

        $data['progressBarPercent'] = [];
        foreach ([5, 4, 3, 2, 1] as $rating) {
            $data['progressBarPercent'][$rating] = 0;
            if (in_array($rating, array_column($data['progessBarRating'], 'rating'))) {
                $totalRatings = array_column($data['progessBarRating'], 'total_rating');
                $data['progressBarPercent'][$rating] = (int) (($totalRatings[array_search($rating, array_column($data['progessBarRating'], 'rating'))] / max(1, $data['reviewCount'])) * 100);
            }
        }

        return view('site.shop.vendor-profile', $data);
    }

    /**
     * Review filter
     *
     * @return render view
     */
    public function searchReview(Request $request)
    {
        if ($request->ajax()) {
            $vendorId = $request->vendor_id ?? $request->input('vendor_id');
            $vendor = Vendor::with('reviews')->find($vendorId);
            $reviewsQuery = $vendor?->reviews()->where('reviews.status', 'Active');
            if ($request->filled('rating')) {
                $reviewsQuery?->where('rating', $request->rating);
            }
            $reviews = $reviewsQuery?->orderByDesc('created_at')->with('user:id,name')->paginate(5);
            $shop = (object) ['vendor_id' => $vendorId];

            $html = view('site.shop.review', compact('shop', 'vendor', 'reviews'))->render();

            return $this->successResponse(['data' => $html]);
        }
        abort(403);
    }
}
