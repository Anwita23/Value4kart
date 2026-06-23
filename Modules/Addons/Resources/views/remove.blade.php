<form action="{{ route('addon.remove', $alias) }}" method="post">
    @csrf
    <div class="addon-modal-body">
        <div class="addon-modal-form-row">
            <span>{{ __('Are you sure to delete this?') }}</span>
        </div>
    </div>
    <div class="addon-modal-foot addon-modal-foot-components rtl:gap-2">
        <x-backend.button.cancel type="button" class="addon-modal-remove addon-remove-modal-close all-cancel-btn" :label="__('Close')" />
        <x-backend.button.save type="submit" class="addon-modal-submit" :label="__('Yes, Confirm')" />
    </div>
</form>
