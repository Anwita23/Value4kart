@extends('admin.layouts.app')
@section('page_title', __('View :x', ['x' => __('Invoice')]))
@section('css')
    <!-- date range picker css -->
    <link rel="stylesheet" href="{{ asset('dist/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}">
    <!-- select2 css -->
    <link rel="stylesheet" href="{{ asset('datta-able/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/plugins/jQueryUI/jquery-ui.min.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('dist/css/invoice.min.css') }}">
@endsection
@section('content')

    <!-- Main content -->
    <div class="col-md-12" id="invoice-view-container">
        {{-- Notification --}}
        <div class="col-md-12 no-print notification-msg-bar smoothly-hide">
            <div class="noti-alert pad">
                <div class="alert bg-dark text-light m-0 text-center">
                    <span class="notification-msg"></span>
                </div>
            </div>
        </div>
        @php
            $sections = (new \App\Services\Order\Section)->getSections();
        @endphp       
        <div class="row">
            <div class="col-md-9">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ Invoice ] start -->
                            <div class="container">
                                <div>
                                    @php
                                    $shippingAddress = $order->getShippingAddress();
                                    $billingAddress = $order->getBillingAddress();
                                    @endphp
                                    <div class="card">
                                        @foreach ($sections as $key => $section)
                                            @if (
                                                ($section['visibility'] ?? '1') == '1' 
                                                && ($section['is_main'] ?? false))
                                                @if($key == 'downloadable') 
                                                    @php $downloadContent = $section['content'] @endphp
                                                    @continue;
                                                @endif
                                                @if (is_callable($section['content']))
                                                    {!! $section['content']() !!}
                                                @else
                                                    @includeIf($section['content'])
                                                @endif
                                            @endif
                                        @endforeach                                        
                                    </div>

                                    @if(isset($downloadContent) && is_callable($downloadContent))
                                    <div class="order-details-container">
                                        {!! $downloadContent() !!}
                                    </div>
                                    @elseif(isset($downloadContent))
                                        <div class="order-details-container">
                                            @includeIf($downloadContent)
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="order-actions-container">
                    @foreach ($sections as $key => $section)
                        @if (
                            ($section['visibility'] ?? '1') == '1' 
                            && !($section['is_main'] ?? false))
                            @if (is_callable($section['content']))
                                {!! $section['content']() !!}
                            @else
                                @includeIf($section['content'])
                            @endif
                        @endif
                    @endforeach
                </div>
            </div> 
                 
        </div>

        {{-- Delete fee/coupon confirmation modal; form submit is handled by invoice_edit.js --}}
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal_label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_modal_label">{{ __('Are you sure?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                    </div>
                    <form action="{{ route('order.customize') }}" method="POST" id="order-delete-fee-coupon-form">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" id="delete_id" name="delete_id" value="">
                        <input type="hidden" id="action_type" name="type" value="">
                        <input type="hidden" name="action" value="delete">
                        <div class="modal-body">
                            <p class="mb-0">{{ __('Once performed, this action cannot be undone.') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Yes, Confirm') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="refund-store" class="modal fade display_none" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Refund') }} &nbsp; </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('site.orderRefund') }}" method="post" class="form-horizontal" data-type="refund">
                            @csrf
                            <input type="hidden" name="quantity_sent" id="quantity_sent" value="1">
                            <input type="hidden" name="order_detail_id" id="order_detail_id">
                            <input type="hidden" name="type" value="admin">
                            <div class="form-group row mb-3">
                                <label class="col-3 control-label" for="inputEmail3">{{ __('Quantity') }}</label>
                                <div class="col-6 d-flex align-items-center">
                                    <a href="javascript:void(0)" class="text-center px-3 py-2 border" id="refundQtyDec"><span class="inline-block">-</span></a>
                                    <div class="px-3" id="refundQty">1</div>
                                    <a href="javascript:void(0)" class="text-center px-3 py-2 border" id="refundQtyInc"><span class="inline-block">+</span></a>
                                </div>
                            </div>

                            <div class="form-group row mt-3 mt-md-0">
                                <label class="col-3 control-label ltr:pe-0 rtl:ps-0 relative" for="inputEmail3">{{ __('Reason') }}</label>
                                <div class="col-8">
                                    <select class="form-control select2" name="refund_reason_id">
                                        @foreach ($refundReasons as $reason)
                                            <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-3 control-label ltr:pe-0 rtl:ps-0" for="is_default"></label>
                                <div class="col-8">
                                    <textarea name="comment" class="form-control" placeholder="{{ __('Please let me know, why are you want to refund this item.') }}" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mt-3 mt-md-0">
                                <div class="col-sm-12">
                                    <x-backend.button.save type="submit" :label="__('Submit')" class="ltr:float-right rtl:float-left" />
                                    <x-backend.button.cancel dismiss :label="__('Close')" class="all-cancel-btn ltr:float-right rtl:float-left" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    $shippingAddress = $order->getShippingAddress();
    $billingAddress = $order->getBillingAddress();
@endphp

@section('js')
    <script>
        var orderId = "{{ $order->id }}";
        var paymentStatus = "{{ $order->payment_status }}";
        var finalOrderStatus = "{{ $finalOrderStatus }}";
        var orderUrl = "{{ route('order.update') }}";
        var orderView = "admin";
        var customProviderImage = "{{ asset(defaultImage('default')) }}";
        var GLOBAL_URL = "{{URL::to('/')}}";

        var ADMIN_URL = SITE_URL;
        var VENDOR_URL = SITE_URL;

        var SITE_URL = "{{ URL::to('/') }}";
        var Order_URL = "{{ url('/vendor/order/actions') }}";
        
        let oldCountry = "{!! $billingAddress->country ?? 'null' !!}";
        let oldState = "{!! $billingAddress->state ?? 'null' !!}";
        let oldCity = "{!! $billingAddress->city ?? 'null' !!}";

        let oldShipCountry = "{!! $shippingAddress->country ?? 'null' !!}";
        let oldShipState = "{!! $shippingAddress->state ?? 'null' !!}";
        let oldShipCity = "{!! $shippingAddress->city ?? 'null' !!}";
        let userAddressUrl = "{{ route('order.user.address') }}";
        var orderCustomizeUrl = "{{ route('order.customize') }}";
        var currentUrl = '{{ route('order.view', $order->id) }}';
        const changeStatusRoute = "{{ route('order.changeStatus') }}";
    </script>
    <script src="{{ asset('datta-able/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/common.min.js') }}"></script>
    <!-- select2 JS -->
    <script src="{{ asset('datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- date range picker Js -->
    <script src="{{ asset('dist/js/moment.min.js') }}"></script>
    <script src="{{ asset('dist/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/invoice.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/order.min.js') }}"></script>
    
    <script src="{{ asset('/public/dist/js/custom/site/address.min.js') }}"></script>

    <script src="{{ asset('dist/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('dist/js/moment.min.js') }}"></script>
    
    <script src="{{ asset('/public/dist/js/custom/site/invoice_edit.min.js') }}"></script>
    
@endsection
