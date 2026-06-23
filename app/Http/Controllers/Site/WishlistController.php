<?php

namespace App\Http\Controllers\Site;

use App\Enums\ProductChannel;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Auth;
use Modules\CMS\Entities\Page;

class WishlistController extends Controller
{
    /**
     * Wishlist
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist = auth()->user()->wishlist()->whereHas('product', function ($q) {
            $q->where(function ($q2) {
                $q2->whereJsonContains('channels', ProductChannel::$MarketPlace)
                    ->orWhereJsonContains('channels', ProductChannel::$Store);
            });
        });

        $page = Page::firstWhere('default', '1');
        $layout = $page->layout;
        $isEnableProduct = option($layout . '_template_product', '');
        $displayPrice = preference('display_price_in_shop');
        $wishlists = $wishlist->paginate(preference('row_per_page'));

        return view('site.myaccount.wishlist', compact('wishlists', 'layout', 'isEnableProduct', 'displayPrice'));
    }

    /**
     * Store
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = ['status' => 0, 'message' => __('Oops! Something went wrong, please try again.')];
        $request['user_id'] = Auth::user()->id ?? null;

        if ((new Wishlist())->checkExistence($request['user_id'], $request->product_id)) {
            if (! isset($request->store_only)) {
                if (Wishlist::where('user_id', \Auth::user()->id)->where('product_id', $request->product_id)->delete()) {
                    return ['status' => 1, 'message' => __('The :x has been successfully deleted.', ['x' => __('Wishlist')])];
                }

                return $response;
            }

            return true;
        }

        return (new Wishlist())->store($request->all());
    }

    /**
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($productId)
    {
        if (Wishlist::where('user_id', \Auth::user()->id)->where('product_id', $productId)->delete()) {
            return back()->withSuccess(__('The :x has been successfully deleted.', ['x' => __('Wishlist')]));
        }

        return back()->withFail(__('Something went wrong, please try again.'));
    }
}
