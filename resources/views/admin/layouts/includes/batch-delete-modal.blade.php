<div class="modal fade admin-delete-modal admin-delete-modal--v2" id="batchDelete" tabindex="-1" role="alertdialog" aria-modal="true" aria-labelledby="batchDeleteLabel" aria-describedby="batchDeleteMessage batchDeleteMessageSecondary" data-bs-backdrop="static" data-bs-keyboard="true">
    <div class="modal-dialog modal-dialog-centered admin-delete-modal-dialog" role="document">
        <div class="modal-content admin-delete-modal-content">
            <header class="admin-delete-modal-header-v2">
                <h2 class="admin-delete-modal-title-v2" id="batchDeleteLabel">{{ __('Delete items?') }}</h2>
                <button type="button" class="admin-delete-modal-close-v2" data-bs-dismiss="modal" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>
            <div class="admin-delete-modal-body-v2">
                <div class="admin-delete-modal-icon-v2" aria-hidden="true">
                    <i class="feather icon-trash-2"></i>
                </div>
                <p class="admin-delete-modal-primary-v2" id="batchDeleteMessage">{{ __('Are you sure you want to delete the selected items?') }}</p>
                <p class="admin-delete-modal-secondary-v2" id="batchDeleteMessageSecondary">{{ __('This action cannot be undone.') }}</p>
            </div>
            <footer class="admin-delete-modal-footer-v2">
                <div class="admin-delete-modal-footer-actions">
                    <x-backend.button.cancel dismiss :label="__('Cancel')" class="admin-delete-modal-btn-ghost" />
                    <button type="button" class="admin-btn admin-btn-danger admin-delete-modal-confirm-btn admin-delete-modal-btn-danger batch-delete-operation">
                        <i class="feather icon-trash-2" aria-hidden="true"></i>
                        <span>{{ __('Delete') }}</span>
                    </button>
                </div>
                <div class="admin-delete-modal-footer-loading" aria-live="polite">
                    <span class="ajax-loading" aria-hidden="true"></span>
                </div>
            </footer>
        </div>
    </div>
</div>
