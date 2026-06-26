<?php

/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 *
 * @created 14-12-2021
 */

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAddressRequest;
use App\Services\Actions\OrderAction as OrderActionService;
use App\Services\Actions\Facades\OrderActionFacade as OrderAction;
use App\Services\Product\AddToCartService;
use Illuminate\Http\Request;
use Modules\Affiliate\Services\ReferralMailService;
use Modules\Gateway\Entities\PaymentLog;
use Modules\Gateway\Facades\GatewayHelper;
use Modules\Gateway\Redirect\GatewayRedirect;
use App\Models\{
    Address,
    Country,
    Currency,
    Product,
    Order,
    OrderDetail,
    OrderMeta,
    OrderStatusHistory,
    Preference,
    OrderStatus,
    User
};
use App\Notifications\OrderInvoiceNotification;
use App\Notifications\VendorOrderInvoiceNotification;
use App\Services\Actions\OrderAction as ActionsOrderAction;
use App\Services\CustomFieldService;
use Modules\Commission\Http\Models\{
    Commission,
    OrderCommission
};
use Cart;
use Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;

class OrderController extends Controller
{
    /**
     * Address view page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $filterDay = [
            'today' => today(),
            'last_week' => now()->subWeek(),
            'last_month' => now()->subMonth(),
            'last_year' => now()->subYear(),
        ];

        $orders = Auth::user()->orders()
            ->where('channel', 'web')
            ->orderBy('order_date', 'desc')
            ->filter();

        if ($request->filled('filter_day') && array_key_exists($request->filter_day, $filterDay)) {
            $orders->whereDate('order_date', '>=', $filterDay[$request->filter_day]);
        }

        $filterStatus = false;
        if ($request->filled('filter_status')) {
            $orders->where('order_status_id', $request->filter_status);
            $filterStatus = true;
        }

        $orders = $orders->paginate(preference('row_per_page'));
        $statuses = OrderStatus::getAll()->sortBy('order_by');

        return view('site.myaccount.order.index', compact('orders', 'statuses', 'filterStatus', 'filterDay'));
    }

    /**
     * Order Checkout
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function checkOut(Request $request)
    {
        Cart::checkCartData();
        $hasCart = Cart::selectedCartCollection();

        $cartService = new AddToCartService();

        if (pageReload()) {
            $cartService->destroySessionAddress();
        }

        $selectedTotal = Cart::totalPrice('selected');
        $taxShipping = $cartService->getTaxShipping();
        $tax = $taxShipping['tax'] ?? 0;
        $shipping = $taxShipping['shipping'] ?? 0;
        $shippingIndex = $cartService->getShippingIndex();

        $addresses = [];
        $defaultAddresses = null;
        $defaultAddress = null;
        if (Auth::check()) {
            $addresses = Address::getAll()->where('user_id', Auth::user()->id);
            $defaultAddresses = Address::getAll()->where('user_id', Auth::user()->id)->where('is_default', 1)->first();
            $defaultAddress = $defaultAddresses ? $defaultAddresses->id : null;
        }

        $countries = Country::getAll();
        $coupon = isActive('Coupon') ? Cart::getCouponData() : null;
        $couponOffer = (isActive('Coupon') && $coupon !== null) ? $coupon : 0;
        $cartService->destroySessionAddress();
        $multicurrencyData = defaultMulticurrencyData();

        return view('site.order.checkout', compact(
            'cartService',
            'selectedTotal',
            'addresses',
            'defaultAddresses',
            'defaultAddress',
            'tax',
            'shipping',
            'shippingIndex',
            'countries',
            'coupon',
            'couponOffer',
            'multicurrencyData'
        ));
    }

    public function buynow(Request $request)
    {
        $cartService = new AddToCartService();
        $cartService->delete($request);
        $cartService->add($request);

        $request['code'] = [$request->itemId];

        return $cartService->addSelected($request);
    }

    /**
     * order store
     *
     * @return void
     */
    public function store(StoreAddressRequest $request)
    {
        if ($this->c_p_c()) {
            Session::flush();

            return view('errors.installer-error', ['message' => __('This product is facing license validation issue.<br>Please contact admin to fix the issue.')]);
        }
        $order = [];
        $detailData = [];
        $cartData = Cart::selectedCartCollection();
        $cartService = new AddToCartService();
        if (is_array($cartData) && count($cartData) > 0) {
            $coupon = 0;
            if (isActive('Coupon')) {
                $coupon = Cart::getCouponData();
            }
            $defaultCurrency = Currency::getDefault();
            if (isset($request->selected_tab) && $request->selected_tab == 'new') {

                $request['user_id'] = Auth::check() ? Auth::user()->id : 0;
                $request['is_default'] = isset($request->default_future) && $request->default_future == 'on' ? 1 : 0;

                if (Auth::check()) {
                    $existsAddressId = (new Address())->store($request->only('user_id', 'first_name', 'last_name', 'phone', 'address_1', 'address_2', 'state', 'country', 'city', 'zip', 'is_default', 'type_of_place', 'email', 'company_name'));
                    $addressId = $existsAddressId;
                } else {
                    $existsAddressId = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'phone' => $request->phone, 'address_1' => $request->address_1, 'address_2' => $request->address_2, 'country' => $request->country, 'state' => $request->state, 'city' => $request->city, 'post_code' => $request->zip, 'type_of_place' => $request->type_of_place, 'email' => $request->email, 'zip' => $request->zip, 'company_name' => $request->company_name];
                    $addressId = (object) $existsAddressId;
                }

                if (isset($request->ship_different) && $request->ship_different == 'on') {
                    $shipDiffAddress = ['country' => $request->shipping_address_country, 'state' => $request->shipping_address_state, 'city' => $request->shipping_address_city, 'post_code' => $request->shipping_address_zip];
                    $addressId = (object) $shipDiffAddress;
                }
            } elseif (isset($request->address_id) && isset($request->selected_tab) && $request->selected_tab == 'old') {
                $defAddress = Address::where('user_id', Auth::user()->id)->where('id', $request->address_id)->first();
                if (! empty($defAddress)) {
                    $existsAddressId = $defAddress->id;
                    $addressId = $existsAddressId;
                } else {
                    return back()->withErrors(['error' => __('Address not found.')])->withInput();
                }
            }

            $taxShipping = $cartService->getTaxShipping($addressId ?? null, 'order');
            $totalTax = $taxShipping['tax'];
            $totalShipping = $taxShipping['shipping'];
            $cartService->destroySessionAddress();
            $cartService->destroyShippingIndex();
            $orderStatus = OrderStatus::getAll()->where('slug', 'pending-payment')->first();
            $userId = Auth::check() ? Auth::user()->id : null;
            $order['user_id'] = $userId;
            $order['order_date'] = DbDateFormat(date('Y-m-d'));
            $order['currency_id'] = $defaultCurrency->id;
            $order['shipping_charge'] = $totalShipping;
            $order['shipping_title'] = $taxShipping['key'] ?? null;
            $order['tax_charge'] = $totalTax;
            $order['total'] = (Cart::totalPrice('selected') + $totalShipping + $totalTax) - $coupon;
            $order['total_quantity'] = Cart::totalQuantity('selected');
            $order['paid'] = 0;
            $order['amount_received'] = 0;
            $order['other_discount_amount'] = 0;
            $order['order_status_id'] = $orderStatus->id;

            $reference = Order::getOrderReference(preference('order_prefix', null));

            $order['reference'] = $reference;

            try {
                DB::beginTransaction();
                $orderId = (new Order())->store($order);
                /* initial history add */
                $history['order_id'] = $orderId;
                $history['order_status_id'] = $orderStatus->id;
                (new OrderStatusHistory())->store($history);
                /* initial history end */
                if (! empty($orderId)) {
                    $downloadable = [];

                    foreach ($cartData as $key => $cart) {
                        $item = Product::where('id', $cart['id'])->published()->first();

                        if ($item->meta_downloadable == 1) {
                            $idCount = 1;
                            foreach ($item->meta_downloadable_files as $files) {
                                if (isset($files['url']) && ! empty($files['url'])) {
                                    $url = urlSlashReplace($files['url'], ['\/', '\\']);
                                    $downloadable[] = [
                                        'id' => $idCount++,
                                        'download_limit' => ! is_null($item->meta_download_limit) && $item->meta_download_limit != '' && $item->meta_download_limit != '-1' ? $item->meta_download_limit * $cart['quantity'] : $item->meta_download_limit,
                                        'download_expiry' => $item->meta_download_expiry,
                                        'link' => $url,
                                        'download_times' => 0,
                                        'is_accessible' => 1,
                                        'vendor_id' => $item->vendor_id,
                                        'name' => $item->name,
                                        'f_name' => $files['name'],
                                    ];
                                }
                            }
                        }

                        $variationMeta = null;
                        if ($cart['type'] == 'Variable Product') {
                            $variationMeta = $cart['variation_meta'];
                        }
                        /* Check Inventory & update */
                        if (! $item->checkInventory($cart['quantity'], $item->meta_backorder, $orderStatus->slug)) {
                            $response = $this->messageArray(__('Invalid Order!'), 'fail');
                            $this->setSessionValue($response);

                            return redirect()->back();
                        }
                        /* End Inventory & update */
                        $shipping = 0;
                        $tax = 0;
                        if (! empty($item)) {
                            $offerFlag = $item->offerCheck();
                            $tax = $offerFlag ? $item->priceWithTax('including tax', 'sale', false, true, false, $addressId, 0, ['cart_price' => $cart['price']]) * $cart['quantity'] : $item->priceWithTax('including tax', 'regular', false, true, false, $addressId, 0, ['cart_price' => $cart['price']]) * $cart['quantity'];

                            if (isActive('Shipping')) {
                                $shipping = $item->shipping(['qty' => $cart['quantity'], 'price' => $cart['price'], 'address' => $addressId, 'from' => 'order']);
                                if (is_array($shipping) && count($shipping) > 0) {
                                    $shipping = $shipping[($taxShipping['key'])];
                                } else {
                                    $shipping = 0;
                                }
                            }
                        }
                        $detailData[] = [
                            'product_id' => $cart['id'],
                            'parent_id' => $cart['parent_id'],
                            'order_id' => $orderId,
                            'vendor_id' => $cart['vendor_id'],
                            'shop_id' => $cart['shop_id'],
                            'product_name' => $cart['name'],
                            'price' => $cart['price'],
                            'quantity_sent' => 0,
                            'quantity' => $cart['quantity'],
                            'order_status_id' => $orderStatus->id,
                            'payloads' => $variationMeta,
                            'order_by' => $key,
                            'shipping_charge' => null,
                            'tax_charge' => $tax,
                            'is_stock_reduce' => $item->isStockReduce($orderStatus->slug),
                            'estimate_delivery' => $item->type == 'Variation' ? $item->parentDetail->estimated_delivery : $item->estimated_delivery,
                        ];

                        if ($item->type == 'Variation') {
                            $item->parentDetail->updateCategorySalesCount();
                        } else {
                            $item->updateCategorySalesCount();
                        }
                    }
                    (new OrderDetail())->store($detailData);
                    OrderAction::store($existsAddressId ?? null, $userId, $orderId, $downloadable, $request);

                    // commission
                    $commission = Commission::getAll()->first();
                    if (! empty($commission) && $commission->is_active == 1) {
                        $orderDetails = OrderDetail::where('order_id', $orderId)->get();
                        $orderCommission = [];
                        foreach ($orderDetails as $details) {
                            if (isset($details->vendor->sell_commissions) && optional($details->vendor)->sell_commissions > 0) {
                                $orderCommission[] = [
                                    'order_details_id' => $details->id,
                                    'category_id' => null,
                                    'vendor_id' => $details->vendor_id,
                                    'amount' => $details->vendor->sell_commissions,
                                    'status' => 'Pending',
                                ];
                            } elseif ($commission->is_category_based == 1 && isset($details->productCategory->category->sell_commissions) && ! empty($details->productCategory->category->sell_commissions) && $details->productCategory->category->sell_commissions > 0) {
                                $orderCommission[] = [
                                    'order_details_id' => $details->id,
                                    'category_id' => $details->productCategory->category_id,
                                    'vendor_id' => null,
                                    'amount' => $details->productCategory->category->sell_commissions,
                                    'status' => 'Pending',
                                ];
                            } else {
                                $orderCommission[] = [
                                    'order_details_id' => $details->id,
                                    'category_id' => $details->productCategory->category_id ?? null,
                                    'vendor_id' => $details->vendor_id ?? null,
                                    'amount' => $commission->amount,
                                    'status' => 'Pending',
                                ];
                            }
                        }
                        if (is_array($orderCommission) && count($orderCommission) > 0) {
                            (new OrderCommission())->store($orderCommission);
                        }
                    }

                    $latestOrder = Order::where('id', $orderId)->first();

                    // end commission
                    if (isActive('Coupon')) {
                        $coupons = Cart::getCouponData(false);
                        $couponRedem = [];
                        if (is_array($coupons) && count($coupons) > 0) {
                            foreach ($coupons as $coupon) {
                                $couponRedem[] = [
                                    'coupon_id' => $coupon['id'],
                                    'coupon_code' => $coupon['code'],
                                    'user_id' => Auth::check() ? Auth::user()->id : null,
                                    'user_name' => Auth::check() ? Auth::user()->name : null,
                                    'order_id' => $orderId,
                                    'order_code' => $latestOrder->reference,
                                    'discount_amount' => $coupon['calculated_discount'],
                                ];
                            }
                            (new \Modules\Coupon\Http\Models\CouponRedeem())->store($couponRedem);
                        }
                    }

                    if (isActive('Affiliate')) {
                        \Modules\Affiliate\Entities\ReferralPurchase::purchase($latestOrder, $detailData);
                    }

                    DB::commit();
                    Cart::selectedCartProductDestroy();

                    // store custom fields
                    CustomFieldService::storeFieldValue($request->custom_fields, $latestOrder->id);

                    if ($latestOrder->total <= 0) {
                        $route = $this->orderWithoutPayment($latestOrder->reference);

                        return redirect($route);
                    } else {
                        request()->query->add(['payer' => 'user', 'to' => techEncrypt('site.orderpaid')]);

                        $route = GatewayRedirect::paymentRoute($latestOrder, $latestOrder->total, $latestOrder->currency->name, $latestOrder->reference, $request);

                        return redirect($route);
                    }
                }
            } catch (Exception $e) {
                DB::rollBack();

                return redirect()->back();
            }
        }

        return redirect()->route('site.cart');
    }

    /**
     * order confirmation
     *
     * @return void
     */
    public function confirmation($reference)
    {
        $order = Order::where('reference', $reference)->first();
        if (
            ! empty($order) && Auth::user() && isset(Auth::user()->role()->type) && Auth::user()->role()->type == 'admin'
            || ! empty($order) && $order->user_id == Auth::id()
            || ! empty($order)  && request()->payer == 'guest'
        ) {
            if (request()->payer == 'guest' || request()->redirect == 'confirmation') {
                return redirect(GatewayRedirect::confirmationRedirect());
            }

            return view('site.order.confirmation', compact('order'));
        }
        if (request()->payer == 'guest') {
            return redirect(GatewayRedirect::failedRedirect('error'));
        }

        return redirect()->back();
    }

    /**
     * order details
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function orderDetails($reference)
    {
        $order = Order::where('reference', $reference)->where('channel', 'web')->first();

        if (! (! empty($order) && isset(Auth::user()->role()->type) && Auth::user()->role()->type == 'admin' || ! empty($order) && $order->user_id == Auth::user()->id)) {
            return redirect()->back();
        }

        $orderStatus = OrderStatus::getAll()->sortBy('order_by');
        $orderDetails = collect($order->orderDetails);
        $orderHistories = collect($order->orderHistories);
        $detailGroups = $orderDetails->groupBy('vendor_id');
        $orderAction = new OrderActionService;
        $customTax = $order->updatedCustomTaxFee($order, true);
        $customFee = $order->metadata->where('key', 'meta_custom_fee')->first();

        $shippingAddress = $order->getShippingAddress();
        $billingAddress = $order->getBillingAddress();

        $feeTotal = 0;
        $customTaxTotal = 0;
        $feeData = [];
        if (! empty($customFee)) {
            $feeData = json_decode($customFee->value) ?? [];
            foreach ($feeData as $fee) {
                if (is_object($fee)) {
                    $feeTotal += $fee->calculated_amount ?? 0;
                    $customTaxTotal += $fee->tax ?? 0;
                }
            }
        }

        $couponOffer = isset($order->couponRedeems) && $order->couponRedeems->sum('discount_amount') > 0 && isActive('Coupon')
            ? $order->couponRedeems->sum('discount_amount')
            : 0;

        $detailProductInfo = [];
        $detailOpName = [];
        foreach ($order->orderDetails as $detail) {
            $detailProductInfo[$detail->id] = $orderAction->getProductInfo($detail);
            $opName = '';
            if ($detail->payloads != null) {
                $option = (array) json_decode($detail->payloads);
                $itemCount = count($option);
                $i = 0;
                foreach ($option as $key => $value) {
                    $opName .= $key . ': ' . $value . (++$i == $itemCount ? '' : ', ');
                }
            }
            $detailOpName[$detail->id] = $opName;
        }

        return view('site.myaccount.order.view', compact(
            'order',
            'orderStatus',
            'orderDetails',
            'orderHistories',
            'detailGroups',
            'customTax',
            'customFee',
            'shippingAddress',
            'billingAddress',
            'feeTotal',
            'customTaxTotal',
            'feeData',
            'couponOffer',
            'detailProductInfo',
            'detailOpName'
        ));
    }

    /**
     * payment process again if payment status is unpaid
     *
     * @param  $reference
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function payment(Request $request)
    {
        $order = Order::where('reference', $request->reference)->first();
        if (! empty($order)) {
            $customTax = $order->updatedCustomTaxFee($order, true);
            $customFee = $order->customFeeCalculations();
            if (optional($order->paymentMethod)->status == 'pending') {
                if (Route::currentRouteName() == 'site.order.payment.guest') {
                    request()->query->add(['payer' => 'guest', 'to' => techEncrypt('site.orderpaid.guest'), 'integrity' => getIntegrityKey()]);
                } else {
                    request()->query->add(['to' => techEncrypt('site.orderpaid')]);
                }

                $paymentLog = PaymentLog::where('code', $order->id)->first();

                if (! empty($paymentLog)) {
                    $paymentLog->total = $order->total + $customTax + $customFee['feeTotal'] + $customFee['customTaxTotal'];
                    $paymentLog->save();
                }

                $route = GatewayRedirect::paymentRoute($order, $order->total + $customTax + $customFee['feeTotal'] + $customFee['customTaxTotal'], $order->currency->name, $order->reference, null, optional($order->paymentMethod)->id);

                return redirect($route);
            }
        }

        if (Route::currentRouteName() == 'site.order.payment.guest') {
            return redirect(GatewayRedirect::failedRedirect());
        }

        return redirect()->back();
    }

    /**
     * order track
     *
     * @param  string  $code
     * @return \Illuminate\Contracts\View\View
     */
    public function track(Request $request)
    {
        if (! $request->filled('code')) {
            return view('site.order.tracking.index');
        }

        if (! OrderMeta::where(['key' => 'track_code', 'value' => $request->code])->count()) {
            return redirect()->route('site.trackOrder')->withErrors(['message' => __('Track code is invalid.'), 'code' => $request->code]);
        }

        $order = Order::with(array_merge(OrderAction::relationsWith(), [
            'orderDetails.vendor.shops',
            'orderDetails.product',
            'orderDetails.parentProduct',
        ]))
            ->join('orders_meta', 'orders.id', 'orders_meta.order_id')
            ->where(['orders_meta.key' => 'track_code', 'orders_meta.value' => $request->code])
            ->selectRaw('orders.*, orders_meta.value as track_code')
            ->first();

        $statuses = OrderStatus::select('id', 'name')->orderBy('order_by')->get();

        $orderDetailRows = $order->orderDetails->map(function ($item) {
            return [
                'item' => $item,
                'vendor' => $item->vendor,
                'product' => $item->parent_id ? $item->parentProduct : $item->product,
            ];
        });

        return view('site.order.tracking.view', compact('order', 'statuses', 'orderDetailRows'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderPaid(Request $request)
    {
        if (! checkRequestIntegrity()) {
            return redirect(GatewayRedirect::failedRedirect('integrity'));
        }

        $isGuest = $request->payer == 'guest';

        try {
            $code = techDecrypt($request->code);
            $order = Order::where('reference', $code)->first();
            $orderStatusInfo = OrderStatus::getAll()->where('slug', 'processing')->first();

            if (! $order) {
                if ($isGuest) {
                    return redirect(GatewayRedirect::failedRedirect())->withErrors(__('Invalid order data.'));
                }

                return redirect()->route('site.cart')->withErrors(__('Order not found.'));
            }

            $log = GatewayHelper::getPaymentLog($order->id);

            if (! $log) {
                if ($isGuest) {
                    return redirect(GatewayRedirect::failedRedirect())->withErrors(__('Payment data not found.'));
                }

                return redirect()->route('site.cart')->withErrors(__('Payment data not found.'));
            }

            if (! FacadesAuth::id()) {
                FacadesAuth::onceUsingId($order->user_id);
            }

            if ($log->status == 'completed') {
                $data = json_decode($log->response);
                $order->paid = $data->amount;
                $order->amount_received = $data->amount;
                $order->payment_status = 'Paid';
                $order->order_status_id = $orderStatusInfo->id;
                // order transaction
                $order->transactionStore();

                foreach ($order->orderDetails as $detail) {
                    (new OrderDetail())->updateOrder(['order_status_id' => $orderStatusInfo->id], $detail->id);
                }

                if (isActive('Affiliate')) {
                    \Modules\Affiliate\Entities\ReferralPurchase::referralPurchaseUpdate($order->id, $orderStatusInfo);
                }
            }

            $order->checkOrderStatus();
            $order->save();

            // Send invoice to user and vendor
            if ($order->user_id) {
                User::find($order->user_id)->notify(new OrderInvoiceNotification($order));
            }

            foreach ($order->orderDetails->groupBy('vendor_id') as $key => $detail) {
                $detail->first()?->vendor?->notify(new VendorOrderInvoiceNotification($order));
            }

            // send referral details to admin
            if (isActive('Affiliate') && preference('refer_details') == 1) {
                (new ReferralMailService())->send($order);
            }

            return redirect()
                ->route($isGuest ? 'site.orderConfirm.guest' : 'site.orderConfirm', withOldQueryString(['reference' => $order->reference]));
        } catch (\Exception $e) {
            if ($isGuest) {
                return redirect(GatewayRedirect::failedRedirect('error'))->withErrors($e->getMessage());
            }

            return redirect()->route('site.cart')->withErrors($e->getMessage());
        }
    }

    /**
     * if order balance will zero then this function will be used
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderWithoutPayment($reference = null)
    {
        $orderStatusInfo = OrderStatus::getAll()->where('slug', 'processing')->first();
        $order = Order::where('reference', $reference)->first();

        if (! $order) {
            return redirect()->route('site.cart')->withErrors(__('Order not found.'));
        }

        try {
            $order->payment_status = 'Paid';
            $order->order_status_id = $orderStatusInfo->id;
            // order transaction
            $order->transactionStore();
            foreach ($order->orderDetails as $detail) {
                (new OrderDetail())->updateOrder(['order_status_id' => $orderStatusInfo->id], $detail->id);
            }

            $order->checkOrderStatus();
            $order->save();

            // Send invoice to user and vendor
            User::find($order->user_id)->notify(new OrderInvoiceNotification($order));
            foreach ($order->orderDetails->groupBy('vendor_id') as $key => $detail) {
                $detail->first()?->vendor?->notify(new VendorOrderInvoiceNotification($order));
            }

            return route('site.orderConfirm', ['reference' => $order->reference]);
        } catch (\Exception $e) {
            return route('site.cart')->withErrors($e->getMessage());
        }
    }

    public function getShippingTax(Request $request)
    {
        $response = ['status' => 0];
        $cartService = new AddToCartService();
        $address = $request->address['address_id'] ?? null;

        if (is_null($address)) {
            $address = ['country' => $request->address['country'], 'state' => $request->address['state'], 'city' => $request->address['city'], 'post_code' => $request->address['zip']];
            $address = (object) $address;
        }
        $cartService->destroyShippingIndex();
        $getTaxShipping = $cartService->getTaxShipping($address, null, true);

        if ($getTaxShipping) {
            $response = ['status' => 1, 'tax' => $getTaxShipping['tax'], 'displayTaxTotal' => $getTaxShipping['displayTaxTotal'], 'shipping' => $getTaxShipping['shipping'], 'totalPrice' => Cart::totalPrice('selected'), 'shippingIndex' => $cartService->getShippingIndex()];
        }

        return $response;
    }

    /**
     * order invoice print
     *
     * @param  Request  $request
     */
    public function invoicePrint($id)
    {
        $order = Order::where(['id' => $id, 'user_id' => auth()->user()->id])->first();
        if (Auth::check() && ! empty($order) && ! empty($order->user_id) || ! Auth::check() && ! empty($order) && empty($order->user_id)) {
            $orderAction = new ActionsOrderAction();
            $data['orderStatus'] = OrderStatus::getAll()->sortBy('order_by');
            $data['order'] = $order;
            $data['invoiceSetting'] = json_decode(preference('invoice'));
            $data['logo'] = Preference::where('field', 'company_logo')->first()->fileUrl();
            if ($data['invoiceSetting']?->document?->header?->logo == 'logo' && $data['invoiceSetting']?->general->logo) {
                $data['logo'] = Preference::where('field', 'invoice')->first()->fileUrl();
            }
            $data['orderAction'] = $orderAction;
            $data['user'] = $order->user;
            $data['orderDetails'] = $order->orderDetails;
            $data['currency'] = $order->currency?->name == 'USD' ? $order->currency?->symbol : $order->currency?->name . ' ';
            $data['shop'] = isActive('Shop');
            $data['couponOffer'] = (isset($order->couponRedeems) && $order->couponRedeems->sum('discount_amount') > 0 && isActive('Coupon')) ? $order->couponRedeems->sum('discount_amount') : 0;
            $data['orderDetailRows'] = $order->orderDetails->map(function ($detail) use ($orderAction) {
                $opName = '';
                if ($detail->payloads != null) {
                    $option = (array) json_decode($detail->payloads);
                    $itemCount = count($option);
                    $i = 0;
                    foreach ($option as $key => $value) {
                        $opName .= $key . ': ' . $value . (++$i == $itemCount ? '' : ', ');
                    }
                }
                $productInfo = $orderAction->getProductInfo($detail);
                try {
                    $productImage = domPdfImageSource($productInfo['image']);
                } catch (\Throwable $th) {
                    $productImage = asset(defaultImage('products'));
                }
                return ['detail' => $detail, 'opName' => $opName, 'productImage' => $productImage];
            });
            $data['customTax'] = $order->updatedCustomTaxFee($order, true);
            $data['customFee'] = $order->customFeeCalculations();
            $data['type'] = request()->get('type') == 'print' || request()->get('type') == 'pdf' ? request()->get('type') : 'print';
            if ($data['type'] == 'pdf' || $data['type'] == 'print') {
                return printPDF($data, $order->reference . '.pdf', 'site.order.invoice', view('site.order.invoice', $data), $data['type']);
            } else {
                return view('site.order.invoice', $data);
            }
        }

        if (! Auth::check()) {
            return redirect()->route('site.index');
        }

        return redirect()->route('site.order');
    }

    /**
     * Check Verification
     *
     * @return bool
     */
    public function c_p_c()
    {
        if (! g_e_v()) {
            return true;
        }
        if (! g_c_v()) {
            try {
                $d_ = g_d();
                $e_ = g_e_v();
                $e_ = explode('.', $e_);
                $c_ = md5($d_ . $e_[1]);
                if ($e_[0] == $c_) {
                    p_c_v();

                    return false;
                }

                return true;
            } catch (\Exception $e) {
                return true;
            }
        }

        return false;
    }
}
