{{-- Coupon Modal --}}
<div id="update_coupon" class="modal fade display_none" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Apply Coupon') }}</h4>
                <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control coupon-code" placeholder="{{ __('Enter Coupon Code') }}">
                            <span><small class="text-danger coupon-error"></small></span>
                            <span><small class="text-success coupon-success"></small></span>
                        </div>
                        <div id="applied_coupon">
                            {{-- Data will be load here --}}
                            @foreach ($order->couponRedeems ?? [] as $redeem)
                                <div class="d-flex justify-content-between single-coupon">
                                    <div class="d-flex justify-content-center">
                                        <p class="text-gray-12 dm-sans font-medium Uppercase text-sm pl-2">{{ __('Coupon') }}: {{ $redeem->coupon_code }}</p>
                                    </div>
                                    <p class="text-gray-12 dm-sans font-medium text-sm single-coupon-amount" data-amount="{{ $redeem->discount_amount }}" data-coupon="{{ $redeem->coupon_code }}">- {{ formatNumber($redeem->discount_amount) }}</p>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-0">
                <div class="form-group row">
                    <label for="btn_save" class="col-sm-3 control-label"></label>
                    <div class="col-sm-12 pe-0">
                        <x-backend.button.save type="submit" :label="__('Apply')" class="py-2 ltr:float-right rtl:float-left me-0 apply-coupon-btn" />
                        <x-backend.button.cancel dismiss :label="__('Close')" class="py-2 ltr:float-right ltr:me-2 rtl:float-left rtl:ms-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
