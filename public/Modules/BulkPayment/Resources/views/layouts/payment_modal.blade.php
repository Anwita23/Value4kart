<div class="modal fade" id="batchPaymentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" action="{{ Route::currentRouteName() == 'vendorOrder.index' ? route('vendor.bulk.payment.order') :  route('bulk.payment.order')}}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Batch Payment') }}</h4>
                    <a type="button" aria-hidden="true" class="close h5" data-bs-dismiss="modal" aria-label="Close">×</a>
                </div>
                <div class="modal-body" id="unpaid_order_list">
                    
                </div>
                
                <div class="modal-footer">
                    <x-backend.button.cancel dismiss :label="__('Close')" class="py-2.5" />
                    <x-backend.button.save type="submit" :label="__('Apply')" />
                </div>
            </div>
        </form>
    </div>
</div>
