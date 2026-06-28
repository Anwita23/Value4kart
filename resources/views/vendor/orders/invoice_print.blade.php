<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ __('Invoice') }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/pdf-invoice.css') }}">
</head>

<body>
    <div id="invoice-view-container">
        <div class="invoice-header">
            <div class="invoice-header-left">
                @if ($invoiceSetting?->document?->header?->logo == 'logo')
                    <span>
                        @if ($invoiceSetting?->general?->invoice_type == 'vendor')
                            @php $vendorLogoUrl = optional($vendor->logo)->fileUrl(); @endphp
                            @if ($vendorLogoUrl && !str_contains($vendorLogoUrl, 'default-image.png'))
                                <img class="martvill-logo" src="{{ domPdfImageSource($vendorLogoUrl) }}">
                            @else
                                <span class="shipping-address">{{ $vendor->name }}</span>
                            @endif
                        @else
                            <img class="martvill-logo" src="{{ domPdfImageSource($logo) }}">
                        @endif
                    </span>
                @endif

                @if ($invoiceSetting?->document?->header?->logo == 'name')
                    @if ($invoiceSetting?->general?->invoice_type == 'vendor')
                        <span>
                            {{ $vendor->name }}
                        </span>
                    @else
                        <span>
                            {{ empty($invoiceSetting?->general?->company_name) ? preference('company_name') : $invoiceSetting?->general?->company_name }}
                        </span>
                    @endif
                @endif
            </div>

            <div class="invoice-header-right">
                @if ($invoiceSetting?->document?->header?->is_invoice_no_show)
                    <div>
                        <h2 class="invoice-title">
                            {{ !empty($invoiceSetting?->document?->header?->invoice_label) ? $invoiceSetting?->document?->header?->invoice_label : __('Invoice') }}
                        </h2>
                        <p class="invoice-id"># {{ $order->reference }}</p>
                        <p class="invoice-date">
                            {{ __('Invoice Date: ') }}{{ $order->order_date }}
                        </p>
                        <p class="invoice-status">
                            <span class="status-text {{ $order->payment_status == 'Paid' ? 'status-paid' : 'status-unpaid' }}">
                                {{ $order->payment_status }}
                            </span>
                        </p>
                    </div>
                @endif
            </div>
        </div>


        <table class="billing-table">
            <tr>
                <!-- Bill From -->
                <td class="billing-cell">
                    <p class="billing-title">{{ __('Bill From') }}</p>
                    @if (!isActive('SaaS'))
                        <p class="billing-name">{{ preference('company_name') }}</p>
                        <p class="billing-text">{{ preference('company_street') }}</p>
                        <p class="billing-text">{{ preference('company_city') }}</p>
                        <p class="billing-text">{{ Modules\GeoLocale\Entities\Country::getNameByCode(preference('company_country')) . ', ' . preference('company_zip_code') }}</p>
                    @else
                        <p class="billing-name">{{ $vendor->name }}</p>
                        <p class="billing-text">{{ $vendor->phone }}</p>
                        <p class="billing-text">{{ $vendor->email }}</p>
                    @endif
                </td>

                <!-- Bill To -->
                <td class="billing-cell">
                    @if ($invoiceSetting?->document?->header?->is_show_customer_info)
                        @php $billingAddress = $order->getBillingAddress(); @endphp
                        @php
                            $hasBillingName = $billingAddress && trim(($billingAddress->first_name ?? '') . ' ' . ($billingAddress->last_name ?? '')) !== '';
                            $hasBillingPhone = $billingAddress && !empty(trim($billingAddress->phone ?? ''));
                            $hasBillingEmail = $billingAddress && !empty(trim($billingAddress->email ?? ''));
                            $hasBillingAddress = $billingAddress && trim(($billingAddress->address_1 ?? '') . ' ' . ($billingAddress->address_2 ?? '')) !== '';
                            $hasBillingCityZip = $billingAddress && array_filter([
                                $billingAddress->city ?? null,
                                $billingAddress->zip ?? null,
                                $billingAddress->country ?? null,
                            ]);
                            $hasBillToData = $hasBillingName || $hasBillingPhone || $hasBillingEmail || $hasBillingAddress || !empty($hasBillingCityZip);
                        @endphp
                        @if ($hasBillToData)
                            <p class="billing-title billing-to-offset">{{ __('Bill To') }}</p>
                        @endif
                        @if ($hasBillingName)
                            <p class="billing-name billing-to-offset">{{ $billingAddress->first_name . ' ' . $billingAddress->last_name }}</p>
                        @endif
                        @if ($hasBillingPhone)
                            <p class="billing-text billing-to-offset">{{ $billingAddress->phone }}</p>
                        @endif
                        @if ($hasBillingEmail)
                            <p class="billing-text billing-to-offset">{{ $billingAddress->email }}</p>
                        @endif
                        @if ($hasBillingAddress)
                            <p class="billing-text billing-to-offset">
                                {{ $billingAddress->address_1 . (!empty($billingAddress->address_2) ? ', ' . $billingAddress->address_2 : '') }}
                            </p>
                        @endif
                        @if ($billingAddress)
                            @php
                                $addressParts = array_filter([
                                    ucfirst($billingAddress->city ?? ''),
                                    $billingAddress->zip ?? '',
                                    \Modules\GeoLocale\Entities\Division::getStateNameByCountryStateCode($billingAddress->country ?? '', $billingAddress->state ?? ''),
                                    \Modules\GeoLocale\Entities\Country::getNameByCode($billingAddress->country ?? ''),
                                ]);
                            @endphp
                            @if (!empty($addressParts))
                                <p class="billing-text billing-to-offset">{{ implode(', ', $addressParts) }}</p>
                            @endif
                        @endif
                    @endif
                </td>

                <!-- Ship To -->
                <td class="billing-cell ship-to">
                    @php $shippingAddress = $order->getShippingAddress(); @endphp
                    @php
                        $hasShipName = $shippingAddress && trim(($shippingAddress->first_name ?? '') . ' ' . ($shippingAddress->last_name ?? '')) !== '';
                        $hasShipPhone = $shippingAddress && !empty(trim($shippingAddress->phone ?? ''));
                        $hasShipEmail = $shippingAddress && !empty(trim($shippingAddress->email ?? ''));
                        $hasShipAddress = $shippingAddress && trim(($shippingAddress->address_1 ?? '') . ' ' . ($shippingAddress->address_2 ?? '')) !== '';
                        $hasShipCityZip = $shippingAddress && array_filter([
                            $shippingAddress->city ?? null,
                            $shippingAddress->zip ?? null,
                            $shippingAddress->country ?? null,
                        ]);
                        $hasShipToData = $hasShipName || $hasShipPhone || $hasShipEmail || $hasShipAddress || !empty($hasShipCityZip);
                    @endphp
                    @if ($hasShipToData)
                        <p class="billing-title">{{ __('Ship To') }}</p>
                    @endif
                    @if ($hasShipName)
                        <p class="billing-name">{{ $shippingAddress->first_name . ' ' . $shippingAddress->last_name }}</p>
                    @endif
                    @if ($hasShipPhone)
                        <p class="billing-text">{{ $shippingAddress->phone }}</p>
                    @endif
                    @if ($hasShipEmail)
                        <p class="billing-text">{{ $shippingAddress->email }}</p>
                    @endif
                    @if ($hasShipAddress)
                        <p class="billing-text">
                            {{ $shippingAddress->address_1 . (!empty($shippingAddress->address_2) ? ', ' . $shippingAddress->address_2 : '') }}
                        </p>
                    @endif
                    @if ($shippingAddress)
                        @php
                            $addressParts = array_filter([
                                $shippingAddress->zip ?? '',
                                ucfirst($shippingAddress->city ?? ''),
                                \Modules\GeoLocale\Entities\Division::getStateNameByCountryStateCode($shippingAddress->country ?? '', $shippingAddress->state ?? ''),
                                \Modules\GeoLocale\Entities\Country::getNameByCode($shippingAddress->country ?? ''),
                            ]);
                        @endphp
                        @if (!empty($addressParts))
                            <p class="billing-text">{{ implode(', ', $addressParts) }}</p>
                        @endif
                    @endif
                </td>
            </tr>
        </table>


        <div class="invoice-wrapper">
            <table class="invoice-table">
                <thead>
                    @if (isActive('Shop'))
                        @php $shop = true; @endphp
                    @endif
                    <tr>
                        @if (isActive('SaaS') || !$invoiceSetting?->document?->product_table?->is_image)
                            <th>{{ __('SL') }}</th>
                        @else
                            <th>{{ __('Image') }}</th>
                        @endif

                        <th>
                            {{ empty($invoiceSetting?->document?->product_table?->product_label) ? __('Product Name') : $invoiceSetting?->document?->product_table?->product_label }}
                        </th>

                        @if ($invoiceSetting?->document?->product_table?->is_quentity)
                            <th class="text-right">
                                {{ empty($invoiceSetting?->document?->product_table?->quentity_label) ? __('Quantity') : $invoiceSetting?->document?->product_table?->quentity_label }}
                            </th>
                        @endif

                        <th class="text-right">{{ __('Price') }}</th>
                        <th class="text-right">{{ __('Amount') }} ({{ $order->currency?->name }})</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $subTotal = 0;
                        $shippingCharge = 0;
                        $tax = 0;
                        $discountAmount = $order->vendorCouponDiscount($vendorId);
                        $feeArray = json_decode($order->fee, true);
                        $totalFee = 0;
                        foreach ($feeArray ?? [] as $item) {
                            $totalFee += (float) $item['amount'];
                        }
                    @endphp

                    @foreach ($order->vendorOrderProduct($vendorId, $order->id) as $index => $detail)
                        @php
                            $opName = '';
                            if ($detail->payloads != null) {
                                $option = (array) json_decode($detail->payloads);
                                $opName = implode(',', array_keys($option) ?? null);
                                $opName .= ': ' . implode(',', $option ?? null);
                            }
                            $subTotal += $detail->price * $detail->quantity;
                            $shippingCharge += $detail->shipping_charge;
                            $tax += $detail->tax_charge;
                            $productInfo = $orderAction->getProductInfo($detail);
                        @endphp
                        <tr>
                            <td class="td pdf-product-name-td text-center">
                                @if (isActive('SaaS') || !$invoiceSetting?->document?->product_table?->is_image)
                                    {{ $index + 1 }}
                                @else
                                    @php
                                        try {
                                            $productImage = domPdfImageSource($productInfo['image']);
                                        } catch (\Throwable $th) {
                                            $productImage = asset(defaultImage('products'));
                                        }
                                    @endphp
                                    <img class="product-image" src="{{ $productImage }}" />
                                @endif
                            </td>
                            <td class="td pdf-product-name-td">
                                <p>{{ $detail->product_name }}</p>
                                @if ($detail->description)
                                    <p class="product-desc">{{ $detail->description }}</p>

                                @endif
                                @if ($invoiceSetting?->document?->product_table?->is_attribute)
                                    <p class="product-desc">{{ $opName }}</p>
                                @endif
                            </td>

                            @if ($invoiceSetting?->document?->product_table?->is_quentity)
                                <td class="td text-center pdf-product-name-td">
                                    <p>{{ formatCurrencyAmount($detail->quantity) . ' ' . $detail->unit ?? $unit->abbr }}</p>
                                </td>
                            @endif

                            <td class="td text-right pdf-product-name-td">
                                <p>{{ formatNumber($detail->price, ' ') }}</p>
                            </td>

                            <td class="td text-right pdf-product-name-td">
                                <p>{{ formatNumber($detail->price * $detail->quantity, ' ') }}</p>
                            </td>
                        </tr>
                    @endforeach
                    @php
                        $colspan = 4;
                        if (!$invoiceSetting?->document?->product_table?->is_quentity) {
                            $colspan = $colspan - 1;
                        }
                    @endphp

                    <tr>
                        <td colspan="{{ $colspan }}" class="text-right calculation-table">{{ __('Sub Total') }}</td>
                        <td class="text-right calculation-table">
                            {{ formatNumber($subTotal, ' ') }}
                        </td>
                    </tr>

                    @if ($totalFee > 0)
                        <tr>
                            <td colspan="{{ $colspan }}" class="text-right calculation-table">{{ __('Fee') }}</td>
                            <td class="text-right calculation-table">
                                {{ formatNumber($totalFee, ' ') }}
                            </td>
                        </tr>
                    @endif
                    
                    @if (($order->channel == 'web' && $shippingCharge > 0) || ($order->channel != 'web' && $order->shipping_charge > 0))
                    <tr>
                        <td colspan="{{ $colspan }}" class="text-right calculation-table">
                            {{ __('Shipping') }}{{ !is_null($order->shipping_title) ? ' (' . $order->shipping_title . ')' : null }}
                        </td>
                        <td class="text-right calculation-table">
                            @if ($order->channel == 'web')
                                {{ formatNumber($shippingCharge, ' ') }}
                            @else
                                {{ formatNumber($order->shipping_charge, ' ') }}
                            @endif
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="{{ $colspan }}" class="text-right calculation-table">{{ __('Tax') }}</td>
                        <td class="text-right calculation-table">
                            @if ($order->channel == 'web')
                                {{ formatNumber($tax + $customTax + $customFee['customTaxTotal'], ' ') }}
                            @else
                                {{ formatNumber($order->tax_charge + $customTax + $customFee['customTaxTotal'], ' ') }}
                            @endif
                        </td>
                    </tr>

                    @if((isset($customFee['feeTotal']) && $customFee['feeTotal']) > 0)
                        <tr>
                            <td colspan="{{ $colspan }}" class="text-right calculation-table">{{ __('Fees') }}</td>
                            <td class="text-right calculation-table">
                                {{ formatNumber($customFee['feeTotal'], ' ') }}
                            </td>
                        </tr>
                    @endif

                    @if ($order->channel == 'web' && $discountAmount > 0)
                        <tr>
                            <td colspan="{{ $colspan }}" class="text-right calculation-table">{{ __('Coupon offer') }} :</td>
                            <td class="text-right calculation-table">
                                -{{ formatNumber($discountAmount, ' ') }}
                            </td>
                        </tr>
                    @endif

                    @if ($order->channel != 'web')
                        @php
                            $couponOffer = isset($order->couponRedeems) && $order->couponRedeems->sum('discount_amount') > 0 && isActive('Coupon') ? $order->couponRedeems->sum('discount_amount') : 0;
                        @endphp
                        @if ($couponOffer > 0)
                            <tr>
                                <td colspan="{{ $colspan }}" class="text-right calculation-table">{{ __('Coupon offer') }} :</td>
                                <td class="text-right calculation-table">
                                    -{{ formatNumber($couponOffer, ' ') }}
                                </td>
                            </tr>
                        @endif
                    @endif

                    @if ($order->channel != 'web' && $order->other_discount_amount > 0)
                        <tr>
                            <td colspan="{{ $colspan }}" class="text-right calculation-table">{{ __('Discount') }} :</td>
                            <td class="text-right calculation-table">
                                -{{ formatNumber($order->other_discount_amount, ' ') }}
                            </td>
                        </tr>
                    @endif

                    <tr class="total-header">
                        <td colspan="{{ $colspan + 1 }}" class="text-right calculation-table total-amount">
                            <div class="total-label">{{ __('Total') }}</div>
                            <div class="total-value">
                                @if ($order->channel == 'web')
                                    {{ formatNumber($subTotal + $shippingCharge + $tax - $discountAmount + $customTax + $customFee['feeTotal'] + $customFee['customTaxTotal'], ' ') }}
                                @else
                                    {{ formatNumber($order->total + $customTax + $customFee['feeTotal'] + $customFee['customTaxTotal'], ' ') }}
                                @endif
                            </div>
                        </td>
                    </tr>

                    @if (strtolower($order->payment_status) == 'partial')
                        @php
                            $grandTotal = $order->channel == 'web'
                                ? ($subTotal + $shippingCharge + $tax - $discountAmount + $customTax + $customFee['feeTotal'] + $customFee['customTaxTotal'])
                                : ($order->total + $customTax + $customFee['feeTotal'] + $customFee['customTaxTotal']);
                            $paidAmount = $order->amount_received ?? 0;
                            $dueAmount = $grandTotal - $paidAmount;
                        @endphp
                        <tr>
                            <td colspan="{{ $colspan }}" class="text-right calculation-table">{{ __('Paid Amount') }}</td>
                            <td class="text-right calculation-table">
                                {{ formatNumber($paidAmount, ' ') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="{{ $colspan }}" class="text-right calculation-table fw-bold text-red">{{ __('Due Amount') }}</td>
                            <td class="text-right calculation-table fw-bold text-red">
                                {{ formatNumber($dueAmount, ' ') }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="track-section">
            @if(count($order->shippingTracks(preference('product_label_wise_shipment_track'))) > 0)
                <h2 class="track-section-title">{{ __('Shipment Tracking Information') }}</h2>
                <div>
                    <table id="track-table">
                        <thead>
                            <tr>
                                @if(preference('product_label_wise_shipment_track'))
                                    <th>{{ __('Item') }}</th>
                                @endif
                                <th>{{ __('Provider') }}</th>
                                <th>{{ __('Tracking Number') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Tracking Url') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(preference('product_label_wise_shipment_track') == 0)
                                @if($order->shippingTrack)
                                    <tr>
                                        <td width="30%">{{ $order->shippingTrack->provider_name ?? 'No Info' }}</td>
                                        <td width="20%">{{ $order->shippingTrack->tracking_no ?? 'No Info' }}</td>
                                        <td width="25%">{{ $order->shippingTrack->order_shipped_date ?? 'No Info' }}</td>
                                        <td width="25%">
                                            <p>{{ $order->shippingTrack->tracking_link ?? 'No Info' }}</p>
                                        </td>
                                    </tr>
                                @endif
                            @else
                                @foreach ($order->vendorOrderProduct($vendorId, $order->id) as $detail)
                                    @if($detail->shippingTrack)
                                        <tr>
                                            <td width="40%">{{ $detail->product_name ?? 'No Info' }}</td>
                                            <td width="20%">{{ $detail->shippingTrack->provider_name ?? 'No Info' }}</td>
                                            <td width="10%">{{ $detail->shippingTrack->tracking_no ?? 'No Info' }}</td>
                                            <td width="20%">{{ $detail->shippingTrack->order_shipped_date ?? 'No Info' }}</td>
                                            <td width="25%">
                                                <p>{{ $detail->shippingTrack->tracking_link ?? 'No Info' }}</p>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <div>
            @if ($invoiceSetting?->document?->footer?->is_footer)
                @if ($invoiceSetting?->document?->footer?->is_main_footer)
                    <p class="keep-in-touch">{{ $invoiceSetting?->document?->footer?->main_footer?->label }}</p>
                    <p class="concern-queries"
                        style="color: {{ $invoiceSetting?->document?->footer?->main_footer?->text_color }}; text-align: {{ $invoiceSetting?->document->footer?->main_footer?->align }};">
                        {{ $invoiceSetting?->document?->footer?->main_footer?->content  }}</p>
                @endif                
                @if ($invoiceSetting?->document?->footer?->is_copy_right_footer)
                    <p 
                        class="copy-right"
                        style="color: {{ $invoiceSetting?->document?->footer?->copy_right_footer?->text_color }}; text-align: {{ $invoiceSetting?->document->footer?->copy_right_footer?->align }};">
                        {{ $invoiceSetting?->document?->footer?->copy_right_footer?->content  }}</p>
                @endif
            @endif
        </div>
    </div>
    @if ($type == 'print')
        <script src="{{ asset('dist/js/custom/site/order-invoice.min.js?v=4.2') }}"></script>
    @endif
</body>

</html>
