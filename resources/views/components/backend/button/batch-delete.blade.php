<a {{ $attributes->merge([
        'class' => 'admin-btn admin-btn-danger mb-0 d-none ltr:me-1 rtl:ms-1',
        'href' => 'javascript:void(0)',
        'data-bs-toggle' => 'modal',
        'data-bs-target' => '#batchDelete',
    ]) }}
>
    <i class="{{ $iconClass ?? 'feather icon-trash-2' }}" aria-hidden="true"></i>
    <span>{{ $label ?? __('Batch Delete') }} (<span class="batch-delete-count">0</span>)</span>
</a>
