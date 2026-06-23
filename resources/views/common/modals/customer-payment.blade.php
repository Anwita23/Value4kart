{{-- Payment Modal --}}

@php
    $paymentRoute = $from == 'vendor' ? 'vendor.customer.paymentStore' : 'customer.paymentStore';
    $paymentRoute = route($paymentRoute, $customer->id);
@endphp
<div id="customer_payment" class="modal fade display_none" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="{{ $paymentRoute }}" method="get" id="customer_payment_form">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Payment for customer') }}</h4>
                    <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label require">{{ __('Amount Paid') }}:</label>
                            <input class="form-control inputFieldDesign" name="amount_paid" required step="0.00000001" min="0" max="{{ $orderTotal - $transactionTotal }}" id="amount_paid" type="number" value="{{ $orderTotal - $transactionTotal }}">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label class="control-label require">{{ __('Payment Date') }}:</label>
                            <input class="form-control inputFieldDesign" required name="payment_date" id="payment_date" value='{{ date('Y-m-d') }}' type="text">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label class="control-label">{{ __('Payment Method') }}:</label>
                            <select class="form-control select2 sl_common_bx" name="payment_method" id="payment_method">
                                @foreach ($paymentMethods as $method)
                                    <option value="{{ $method->name }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mt-2">
                            <h6>{{ __('Transaction ID') }}:</h6>
                            <input class="form-control inputFieldDesign" name="transaction_id" id="transaction_id" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer py-0">
                    <div class="form-group row">
                        <label for="btn_save" class="col-sm-3 control-label"></label>
                        <div class="col-sm-12 pe-0">
                            <x-backend.button.save type="submit" :label="__('Apply')" class="py-2 ltr:float-right rtl:float-left me-0 apply-payment-btn" />
                            <x-backend.button.cancel dismiss :label="__('Close')" class="py-2 ltr:float-right ltr:me-2 rtl:float-left rtl:ms-2" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
