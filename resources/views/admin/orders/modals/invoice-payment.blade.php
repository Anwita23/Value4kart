{{-- Payment Modal --}}
<div id="invoice_payment" class="modal fade display_none" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="{{ route('order.partialPayment', $order->id) }}" method="post" id="payment_form">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Payment for invoice :x', ['x' => '#' . $order->reference]) }}</h4>
                    <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label require">{{ __('Amount Received') }}:</label>
                            <input class="form-control inputFieldDesign" name="amount_received" required step="0.00000001" min="0" max="{{ $order->total - $order->amount_received }}" id="amount_received" type="number" value="{{ $order->total - $order->amount_received }}">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label class="control-label require">{{ __('Payment Date') }}:</label>
                            <input class="form-control inputFieldDesign" required name="payment_date" id="payment_date" value='{{ date('Y-m-d') }}' type="text">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label class="control-label require">{{ __('Payment Method') }}:</label>
                            <select class="form-control select2 sl_common_bx" name="payment_method" id="payment_method" required>
                                <option value="">{{ __('Select One') }}</option>
                                @foreach ($paymentMethods as $method)
                                    @php
                                        $paymentMethod = $method->name == 'CashOnDelivery' ? __('Cash') : $method->name;
                                    @endphp
                                    <option value="{{ $paymentMethod }}">{{ $paymentMethod }}</option>
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
