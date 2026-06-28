@props([
    'modalId' => 'confirmDelete',
    'submitBtnId' => 'confirmDeleteSubmitBtn',
    'titleId' => null,
    'messageId' => 'confirmDeleteMessage',
    'title' => __('Delete item?'),
    'message' => __('Are you sure you want to delete this item?'),
    'messagePrimary' => null,
    'messageSecondary' => null,
    'itemLabel' => null,
    'itemName' => null,
    'confirmLabel' => __('Delete'),
    'includeBatchDelete' => true,
    'includeScript' => true,
    'includeCmsInternalForm' => false,
    'cmsSectionBuilder' => false,
])

@php
    $titleElId = $titleId ?? $modalId . 'Label';
    $secondaryId = $modalId . 'MessageSecondary';
    if ($cmsSectionBuilder) {
        $displayTitle = __('Delete Section');
    } elseif ($itemLabel !== null && $itemName !== null) {
        $displayTitle = __('Delete :label: :name?', ['label' => $itemLabel, 'name' => $itemName]);
    } else {
        $displayTitle = $title;
    }
    $useCmsSectionBtn = $includeCmsInternalForm || $cmsSectionBuilder;
    $confirmBtnClass = 'admin-delete-modal-confirm-btn admin-delete-modal-btn-danger' . ($useCmsSectionBtn ? ' delete-section-btn' : '');
    $confirmDataTask = $cmsSectionBuilder ? '1' : '';
    $footerConfirmLabel = $cmsSectionBuilder ? __('Delete') : $confirmLabel;
    $primaryText = $messagePrimary ?? $message;
    $secondaryText = $messageSecondary;
    if ($secondaryText === null && !$cmsSectionBuilder && $modalId === 'confirmDelete') {
        $secondaryText = __('This action cannot be undone.');
    }
@endphp

<div
    class="modal fade admin-delete-modal admin-delete-modal--v2"
    id="{{ $modalId }}"
    tabindex="-1"
    role="alertdialog"
    aria-modal="true"
    aria-labelledby="{{ $titleElId }}"
    @if(!$cmsSectionBuilder) aria-describedby="{{ trim($messageId . ($secondaryText ? ' ' . $secondaryId : '')) }}" @endif
    data-bs-backdrop="static"
    data-bs-keyboard="true"
>
    <div class="modal-dialog modal-dialog-centered admin-delete-modal-dialog" role="document">
        <div class="modal-content admin-delete-modal-content">
            <header class="admin-delete-modal-header-v2">
                <h2 class="admin-delete-modal-title-v2" id="{{ $titleElId }}">{{ $displayTitle }}</h2>
                <button
                    type="button"
                    class="admin-delete-modal-close-v2"
                    data-bs-dismiss="modal"
                    aria-label="{{ __('Close') }}"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <div class="admin-delete-modal-body-v2">
                @if($cmsSectionBuilder)
                    <div class="admin-delete-modal-icon-v2" aria-hidden="true">
                        <i class="feather icon-trash-2"></i>
                    </div>
                    <p class="admin-delete-modal-primary-v2 mb-2">{{ __('Are you sure you want to delete this section?') }}</p>
                    <p class="admin-delete-modal-secondary-v2 mb-0">
                        <strong>{{ __('Section') }}:</strong> <span id="component-title"></span>
                    </p>
                @else
                    <div class="admin-delete-modal-icon-v2" aria-hidden="true">
                        <i class="feather icon-trash-2"></i>
                    </div>
                    <p class="admin-delete-modal-primary-v2" id="{{ $messageId }}">{{ $primaryText }}</p>
                    <p
                        class="admin-delete-modal-secondary-v2 {{ $secondaryText ? '' : 'd-none' }}"
                        id="{{ $secondaryId }}"
                        @if(!$secondaryText) hidden @endif
                    >{{ $secondaryText }}</p>

                    @if($includeCmsInternalForm)
                        <form action="#" id="internal_form" method="post" class="mt-3">
                            @csrf
                            <input type="hidden" name="data" id="data">
                        </form>
                    @endif
                @endif
            </div>

            <footer class="admin-delete-modal-footer-v2">
                <div class="admin-delete-modal-footer-actions">
                    <x-backend.button.cancel dismiss :label="__('Cancel')" class="admin-delete-modal-btn-ghost" />
                    <x-backend.button.delete
                        type="button"
                        :id="$submitBtnId"
                        :label="$footerConfirmLabel"
                        class="{{ $confirmBtnClass }}"
                        data-task="{{ $confirmDataTask }}"
                    />
                </div>
                <div class="admin-delete-modal-footer-loading" aria-live="polite">
                    <span class="ajax-loading" aria-hidden="true"></span>
                </div>
            </footer>
        </div>
    </div>
</div>
@if($includeScript)
    <script src="{{ asset('dist/js/custom/delete-modal.min.js') }}"></script>
@endif
@if($includeBatchDelete)
    @include('admin.layouts.includes.batch-delete-modal')
@endif
