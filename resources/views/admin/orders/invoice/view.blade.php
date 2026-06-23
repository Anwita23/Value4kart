<div class="row mb-4">
    <div class="col-md-12">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- [ Main Content ] start -->
                <div class="row">
                    <!-- [ Invoice ] start -->
                    <div>
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-uppercase"> {{ __('View Invoice') }}</h5>
                                    <div class="row">
                                        <div class="col-sm-12 col-md">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6 class="card-subtitle text-muted">{{ __('Payment Status') }} :
                                                        <span
                                                            class="badge {{ $order->payment_status == 'Paid' ? 'badge-mv-success' : 'badge-mv-danger' }} payment-status-badge">{{ $order->payment_status }}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header-right">
                                        @php
                                            $editRoute = 'order.edit';
                                            $pdfRoute = 'invoice.print';
                                            $cancelInvoiceRoute = 'order.cancelInvoice';
                                            $markAsPaidRoute = 'order.markAsPaid';
                                            $markAsUnpaidRoute = 'order.markAsUnpaid';
                                            if (isset($panel) && $panel == 'vendor') {
                                                $editRoute = 'vendorOrder.edit';
                                                $pdfRoute = 'vendorInvoice.print';
                                                $cancelInvoiceRoute = 'vendorOrder.cancelInvoice';
                                                $markAsPaidRoute = 'vendorOrder.markAsPaid';
                                                $markAsUnpaidRoute = 'vendorOrder.markAsUnpaid';
                                            }
                                            $isCancelled = optional($order->orderStatus)->slug === 'cancelled';
                                            $isFullyPaid = $order->amount_received >= $order->total;
                                        @endphp
                                        @if ($order->payment_status != 'Paid' && !$isCancelled)
                                            <a class="order-invoice-action"
                                                href="{{ route($editRoute, ['id' => $order->id]) }}">
                                                <i class="feather icon-edit"></i></a>
                                        @endif
                                        <a class="order-invoice-action" target="_blank" href="{{ route($pdfRoute, ['id' => $order->id, 'type' => 'print' ]) }}"><i
                                                class="fas fa-file-pdf"></i></a>
                                        @php
                                            $hasCustomerOrUser = $order->customer_id || $order->user_id;
                                            $customerOrUserEmail = ($order->customer_id && !empty(optional($order->customer)->email)) || ($order->user_id && !empty(optional($order->user)->email));
                                            $hasCustomerOrUserWithEmail = $hasCustomerOrUser && $customerOrUserEmail;
                                            $isVendorPanel = isset($panel) && $panel === 'vendor';
                                        @endphp

                                        @if ($hasCustomerOrUserWithEmail || !$isVendorPanel)
                                            <div class="dropdown email">
                                                <div class="dd-button email">
                                                    <a href="javascript:void(0)" class="order-invoice-action ps-2 pe-4">
                                                        <i class="feather icon-mail"></i>
                                                    </a>
                                                </div>

                                                <ul class="dd-menu email d-none">
                                                    @if ($hasCustomerOrUserWithEmail)
                                                        <li>
                                                            <a href="javascript:void(0)" id="send_mail_to_customer">
                                                                {{ __('Send Mail to Customer') }}
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @unless($isVendorPanel)
                                                        <li>
                                                            <a href="javascript:void(0)" id="send_mail_to_vendor">
                                                                {{ __('Send Mail to Vendor') }}
                                                            </a>
                                                        </li>
                                                    @endunless
                                                </ul>
                                            </div>
                                        @endif

                                        <a class="order-invoice-action {{ $order->total - $order->amount_received <= 0 || $isCancelled ? 'disabled text-muted disabled-btn' : '' }}"
                                            href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="{{ $order->total - $order->amount_received <= 0 || $isCancelled ? '' : '#invoice_payment' }}">
                                            {{ __('Payment') }}
                                        </a>
                                        @if (!$isCancelled)
                                            <div class="dropdown d-inline ms-2 invoice-actions-dropdown">
                                                <button type="button" class="btn btn-sm btn-icon order-invoice-action-btn rounded-circle" data-bs-toggle="dropdown" aria-expanded="false" title="{{ __('Actions') }}">
                                                    <i class="feather icon-more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end invoice-actions-menu shadow-sm py-1">
                                                    @if (!$isFullyPaid)
                                                        <li class="invoice-action-item">
                                                            <form action="{{ route($markAsPaidRoute, $order->id) }}" method="POST" class="m-0">
                                                                @csrf
                                                                <button type="submit" class="invoice-action-link text-success w-100 text-start border-0 bg-transparent py-2 px-3 d-flex align-items-center gap-2">
                                                                    <i class="feather icon-check" style="width: 1.125rem; height: 1.125rem;"></i>
                                                                    <span>{{ __('Mark as Paid') }}</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif
                                                    @if ($isFullyPaid)
                                                        <li class="invoice-action-item">
                                                            <a href="javascript:void(0)" class="invoice-action-link text-dark py-2 px-3 d-flex align-items-center gap-2 invoice-action-confirm" data-bs-toggle="modal" data-bs-target="#invoiceActionConfirmModal" data-invoice-action="mark-unpaid" data-message="{{ __('Are you sure you want to mark this order as unpaid? Payment history will be cleared.') }}">
                                                                <i class="feather icon-x-circle" style="width: 1.125rem; height: 1.125rem;"></i>
                                                                <span>{{ __('Mark as Unpaid') }}</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li><hr class="dropdown-divider my-1"></li>
                                                    <li class="invoice-action-item">
                                                        <a href="javascript:void(0)" class="invoice-action-link text-danger py-2 px-3 d-flex align-items-center gap-2 invoice-action-confirm" data-bs-toggle="modal" data-bs-target="#invoiceActionConfirmModal" data-invoice-action="cancel" data-message="{{ __('Are you sure you want to cancel this order? Stock will be adjusted.') }}">
                                                            <i class="feather icon-trash-2" style="width: 1.125rem; height: 1.125rem;"></i>
                                                            <span>{{ __('Cancel') }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- Hidden forms for modal confirmation --}}
                                            <form id="invoice-action-form-mark-unpaid" action="{{ route($markAsUnpaidRoute, $order->id) }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            <form id="invoice-action-form-cancel" action="{{ route($cancelInvoiceRoute, $order->id) }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                {{-- Invoice info --}}
                                <div class="card-block pb-5">
                                    <div class="row invoive-info">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="fw-bold text-dark f-20 mb-3 mt-3 mt-md-0">
                                                #{{ $order->reference }}
                                            </div>
                                            <div class="text-dark mb-1">
                                                <span class="fw-bold">{{ __('Invoice Date') }}:</span>
                                                {{ formatDate($order->order_date) }}
                                            </div>

                                            @if ($order->paymentMethod?->gateway)
                                                <div class="text-dark mb-1">
                                                    <span class="fw-bold">{{ __('Gateway') }}:</span>
                                                    {{ paymentRenamed($order->paymentMethod?->gateway) }}
                                                </div>
                                            @endif
                                            
                                            @unless(isset($panel) && $panel == 'vendor')
                                                <div class="text-dark mb-1">
                                                    <span class="fw-bold">{{ __('Vendor') }}:</span>
                                                    {{ $order->orderDetails->first()?->vendor?->name }}
                                                </div>
                                            @endunless

                                            <div class="text-dark mb-1">
                                                <span class="fw-bold">{{ __('Customer') }}:</span>
                                                {{ $order->user?->name ?? $order->customer?->name ?? $order->customer?->phone ?? __('Guest') }}
                                            </div>
                                            <div class="text-dark mb-1">
                                                <span class="fw-bold">{{ __('Inventory') }}:</span>
                                                {{ $location?->name }}
                                            </div>
                                            <div class="text-dark mb-1">
                                                <span class="fw-bold">{{ __('Track code') }}:</span>
                                                {{ isset($order->getMeta()['track_code']) ? $order->getMeta()['track_code'] : __('Unavailable') }}
                                            </div>
                                            @if ($orderStatus)
                                                <div class="text-dark mb-1">
                                                    <span class="fw-bold">{{ __('Status') }}:</span>
                                                    {{ $orderStatus->name }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="fw-bold text-dark mb-3 mt-3 mt-md-0">
                                                <span class="pe-2">{{ __('Bill To') }}</span>
                                            </div>
                                            <address>
                                                @if (!empty($billingAddress->first_name))
                                                    <span
                                                        class="billing-address-name">{{ $billingAddress->first_name . ' ' . $billingAddress->last_name }}</span><br>
                                                @else
                                                    <span class="billing-address-name">---------------</span><br>
                                                @endif
                                                @if (!empty($billingAddress->phone))
                                                    <span
                                                        class="billing-address-phone">{{ $billingAddress->phone }}</span><br>
                                                @else
                                                    <span class="billing-address-phone">---------------</span><br>
                                                @endif
                                                @if (!empty($billingAddress->email))
                                                    <span
                                                        class="billing-address-email">{{ $billingAddress->email }}</span><br>
                                                @else
                                                    <span class="billing-address-email">--------------------</span><br>
                                                @endif
                                                <div class="mb-1">-------------------------------------------</div>
                                                @if (!empty($billingAddress->address_1))
                                                    <span
                                                        class="billing-address-street">{{ $billingAddress->address_1 }}
                                                        {{ !empty($billingAddress->address_2) ? ', ' . $billingAddress->address_2 : '' }}</span><br>
                                                @else
                                                    <span class="billing-address-street">-------------</span><br>
                                                @endif
                                                @if (!empty($billingAddress->city))
                                                    <span
                                                        class="billing-address-city">{{ $billingAddress->city }}</span>,
                                                @else
                                                    <span class="billing-address-city">--------------</span>,
                                                @endif
                                                @if (!empty($billingAddress->state))
                                                    <span
                                                        class="billing-address-state">{{ $billingAddress->state }}</span>
                                                @else
                                                    <span class="billing-address-state">-------------</span>
                                                @endif
                                                <br>
                                                @if (!empty($billingAddress->country))
                                                    <span
                                                        class="billing-address-country">{{ $billingAddress->country }}</span>,
                                                @else
                                                    <span class="billing-address-country">----------</span>,
                                                @endif
                                                @if (!empty($billingAddress->zip))
                                                    <span class="billing-address-zip">{{ $billingAddress->zip }}</span>
                                                @else
                                                    <span class="billing-address-zip">---------------</span>
                                                @endif
                                                @if (!empty($billingAddress->type_of_place))
                                                    <span
                                                        class="billing-address-type-of-place">({{ ucfirst($billingAddress->type_of_place) }})</span>
                                                @endif
                                            </address>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="fw-bold text-dark mb-3 mt-3 mt-md-0">
                                                <span class="pe-2">{{ __('Ship To') }}</span>
                                            </div>
                                            <address>
                                                @if (!empty($shippingAddress->first_name))
                                                    <span
                                                        class="shipping-address-name">{{ $shippingAddress->first_name . ' ' . $shippingAddress->last_name }}</span><br>
                                                @else
                                                    <span class="shipping-address-name">---------------</span><br>
                                                @endif

                                                @if (!empty($shippingAddress->phone))
                                                    <span
                                                        class="shipping-address-phone">{{ $shippingAddress->phone }}</span><br>
                                                @else
                                                    <span class="shipping-address-phone">---------------</span><br>
                                                @endif

                                                @if (!empty($shippingAddress->email))
                                                    <span
                                                        class="shipping-address-email">{{ $shippingAddress->email }}</span><br>
                                                @else
                                                    <span class="shipping-address-email">--------------------</span><br>
                                                @endif
                                                <div class="mb-1">-------------------------------------------</div>
                                                @if (!empty($shippingAddress->address_1))
                                                    <span
                                                        class="shipping-address-street">{{ $shippingAddress->address_1 }}
                                                        {{ !empty($shippingAddress->address_2) ? ', ' . $shippingAddress->address_2 : '' }}</span><br>
                                                @else
                                                    <span class="shipping-address-street">-------------</span><br>
                                                @endif
                                                @if (!empty($shippingAddress->city))
                                                    <span
                                                        class="shipping-address-city">{{ $shippingAddress->city }}</span>,
                                                @else
                                                    <span class="shipping-address-city">--------------</span>,
                                                @endif
                                                @if (!empty($shippingAddress->state))
                                                    <span
                                                        class="shipping-address-state">{{ $shippingAddress->state }}</span>
                                                @else
                                                    <span class="shipping-address-state">-------------</span>
                                                @endif
                                                <br>
                                                @if (!empty($shippingAddress->country))
                                                    <span
                                                        class="shipping-address-country">{{ $shippingAddress->country }}</span>,
                                                @else
                                                    <span class="shipping-address-country">----------</span>,
                                                @endif
                                                @if (!empty($shippingAddress->zip))
                                                    <span
                                                        class="shipping-address-zip">{{ $shippingAddress->zip }}</span>
                                                @else
                                                    <span class="shipping-address-zip">---------------</span>
                                                @endif
                                                @if (!empty($shippingAddress->type_of_place))
                                                    <span
                                                        class="shipping-address-type-of-place">({{ ucfirst($shippingAddress->type_of_place) }})</span>
                                                @endif
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                {{-- Product part --}}
                                <div class="card-block calculations_div border-top pt-5" id="calculations_div">
                                    {{-- Product list --}}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table invoice-detail-table">
                                                    <thead class="product-list-thead">
                                                        <tr class="thead-default">
                                                            <th class="w-5"><i
                                                                    class="feather icon-camera ms-1"></i></th>
                                                            <th>{{ __('Products') }}</th>
                                                            <th class="align-center">{{ __('Unit') }}</th>
                                                            <th class="align-center w-10">{{ __('Qty') }}</th>
                                                            <th class="align-center">{{ __('Cost') }}</th>
                                                            <th class="text-end w-5">{{ __('Total') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="product-list-tbody">
                                                        @php
                                                            $subTotal = 0;
                                                        @endphp
                                                        @foreach ($order->orderDetails as $detail)
                                                            @php
                                                                $subTotal += $detail->price * $detail->quantity;
                                                            @endphp
                                                            <tr class="product-list product-list-tr-view">
                                                                <td>
                                                                    @php
                                                                        if (is_null($detail->parent_id)) {
                                                                            $productImage = $detail->product->getFeaturedImage();
                                                                        } else {
                                                                            $productImage = $detail->product->getImages(
                                                                                true,
                                                                                'small',
                                                                            );

                                                                            if (is_array($productImage)) {
                                                                                $productImage = $productImage[0];
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    <img src="{{ $productImage }}"
                                                                        class="product-img"
                                                                        alt="{{ __('Product Image') }}">
                                                                </td>
                                                                <td>
                                                                    <div class="text-start">
                                                                        <div class="text-dark">
                                                                            <span
                                                                                class="mt-1 d-block">{{ $detail->product_name }}</span>
                                                                            <p class="text-muted">
                                                                                {{ $detail->description }}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center fw-bold">
                                                                        {{ $detail->unit ?? $unit->abbr }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center fw-bold">
                                                                        {{ rtrim(rtrim(number_format((float) $detail->quantity, 4, '.', ''), '0'), '.') }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center fw-bold">
                                                                        {{ formatNumber($detail->price) }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-end fw-bold">
                                                                        {{ formatNumber($detail->price * $detail->quantity) }}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        <tr>
                                                            <td colspan="6" class="pt-5 no-border"></td>
                                                        </tr>

                                                        <tr class="total-summary-area">
                                                            <td colspan="3" class="no-border"></td>
                                                            <td colspan="1" class="text-end fw-bold title">
                                                                {{ __('Sub Total') }}</td>
                                                            <td colspan="2"
                                                                class="text-end text-dark price subtotal"
                                                                data-amount="0">{{ formatNumber($subTotal) }}</td>
                                                        </tr>
                                                        <tr class="total-summary-area">
                                                            <td colspan="3" class="no-border"></td>
                                                            <td colspan="1" class="text-end fw-bold title">
                                                                {{ __('Fee') }}
                                                            </td>
                                                            @php
                                                                $feeArray = json_decode($order->fee, true);
                                                                $totalFee = 0;
                                                                foreach ($feeArray ?? [] as $item) {
                                                                    $totalFee += (float) $item['amount'];
                                                                }
                                                            @endphp
                                                            <td colspan="2"
                                                                class="text-end text-dark adjustment-fee price"
                                                                data-amount="0">{{ formatNumber($totalFee) }}</td>
                                                        </tr>
                                                        @if ($order->shipping_charge > 0)
                                                        <tr class="total-summary-area">
                                                            <td colspan="3" class="no-border"></td>
                                                            <td colspan="1" class="text-end fw-bold title">
                                                                {{ __('Shipping') }}
                                                            </td>
                                                            <td colspan="2"
                                                                class="text-end text-dark price shipping-fee"
                                                                data-amount="0">
                                                                {{ formatNumber($order->shipping_charge) }}</td>
                                                        </tr>
                                                        @endif
                                                        <tr class="total-summary-area">
                                                            <td colspan="3" class="no-border"></td>
                                                            <td colspan="1"
                                                                class="text-end fw-bold title tax-title">
                                                                {{ __('Tax') }}</td>
                                                            <td colspan="2"
                                                                class="text-end text-dark price tax-amount"
                                                                data-amount="0">{{ formatNumber($order->tax_charge) }}
                                                            </td>
                                                        </tr>
                                                        <tr class="total-summary-area">
                                                            <td colspan="3" class="no-border"></td>
                                                            <td colspan="1" class="text-end fw-bold title">
                                                                {{ __('Coupon Offer') }}
                                                            </td>
                                                            <td colspan="2"
                                                                class="text-end text-dark price coupon-amount"
                                                                data-amount="0">
                                                                {{ formatNumber(isset($order->couponRedeems) && $order->couponRedeems->sum('discount_amount') > 0 && isActive('Coupon') ? $order->couponRedeems->sum('discount_amount') : 0) }}
                                                            </td>
                                                        </tr>
                                                        <tr class="total-summary-area">
                                                            <td colspan="3" class="no-border"></td>
                                                            <td colspan="1" class="text-end fw-bold title">
                                                                {{ __('Discount') }}
                                                            </td>
                                                            <td colspan="2"
                                                                class="text-end text-dark price discount-amount"
                                                                data-amount="0">{{ formatNumber($order->other_discount_amount) }}
                                                            </td>
                                                        </tr>
                                                        <tr class="total-summary-area border-bottom-0">
                                                            <td colspan="3" class="no-border"></td>
                                                            <td colspan="1"
                                                                class="text-end fw-bold text-dark title border-bottom-0">
                                                                {{ __('Total') }}</td>
                                                            <td colspan="2"
                                                                class="text-end fw-bold text-dark price border-bottom-0 grand-total">
                                                                {{ formatNumber($order->total) }}</td>
                                                        </tr>
                                                        <tr class="total-summary-area border-bottom-0">
                                                            <td colspan="3" class="no-border"></td>
                                                            <td colspan="1"
                                                                class="text-end fw-bold text-dark title border-bottom-0">
                                                                {{ __('Due') }}</td>
                                                            <td colspan="2"
                                                                class="text-end fw-bold text-red price border-bottom-0 pb-4 grand-total">
                                                                @php
                                                                    $dueAmount = $order->total - $order->amount_received;
                                                                @endphp
                                                                {!! $dueAmount < 0 
                                                                    ? '-' . formatNumber(abs($dueAmount)) 
                                                                    : formatNumber($dueAmount) !!}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @if ($order->customer_note)
                                                    <div class="form-group m-0 p-2">
                                                        <label for="customer_note"
                                                            class="control-label text-dark">{{ __('Customer Note') }}:</label>
                                                        <div>
                                                            {{ $order->customer_note }}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($transactions->count() > 0)
                                    <div class="card-footer invoice-footer">
                                        <div class="table-responsive">
                                            <table class="table invoice-detail-table">
                                                <thead>
                                                    <th>{{ __('Transaction ID') }}</th>
                                                    <th>{{ __('Payment Method') }}</th>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Amount') }}</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transactions as $transaction)
                                                        @continue(!$transaction['amount'])
                                                        <tr>
                                                            <td>{{ $transaction['transaction_id'] }}</td>
                                                            <td>{{ $transaction['payment_method'] }}</td>
                                                            <td>{{ formatDate($transaction['date']) }}</td>
                                                            <td>{{ formatNumber($transaction['amount']) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Confirmation modal for Mark as Unpaid / Cancel (same style as delete modal) --}}
<div class="modal modal-blur fade" id="invoiceActionConfirmModal" tabindex="-1" role="dialog" data-default-message="{{ __('Once performed, this action cannot be undone.') }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger" style="width: 3.5rem;height: 3.5rem;" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v4"></path><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path><path d="M12 16h.01"></path></svg>
                <h3 class="fs-6 lh-1_5 fw-600">{{ __('Are you sure?') }}</h3>
                <p id="invoiceActionConfirmMessage" class="text-secondary text-muted">{{ __('Once performed, this action cannot be undone.') }}</p>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="button" id="invoiceActionConfirmBtn" class="btn btn-danger">{{ __('Yes, Confirm') }}</button>
            </div>
        </div>
    </div>
</div>
