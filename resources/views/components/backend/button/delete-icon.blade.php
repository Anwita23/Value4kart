@props([
    'route' => null,
    'id' => null,
    'label' => __('Delete'),
    'dataDelete' => 'data',
    'dataTitle' => null,
    'dataMessage' => null,
    'modalTarget' => '#confirmDelete',
    'method' => 'POST',
    'iconClass' => 'feather icon-trash-2',
])

@if($route && $id)
    <form method="post" action="{{ $route }}" id="delete-data-{{ $id }}" accept-charset="UTF-8" class="display_inline">
        @csrf
        @method($method)
        <a
            title="{{ $label }}"
            class="admin-btn admin-btn-icon admin-btn-icon-danger confirm-delete"
            type="button"
            data-id="{{ $id }}"
            data-delete="{{ $dataDelete }}"
            data-label="Delete"
            data-bs-toggle="modal"
            data-bs-target="{{ $modalTarget }}"
            @if($dataTitle) data-title="{{ $dataTitle }}" @endif
            @if($dataMessage) data-message="{{ $dataMessage }}" @endif
            {{ $attributes->except('class') }}
        >
            @if(!$slot->isEmpty())
                {{ $slot }}
            @else
                <i class="{{ $iconClass }}" aria-hidden="true"></i>
            @endif
        </a>
    </form>
@else
    <a
        title="{{ $label }}"
        class="admin-btn admin-btn-icon admin-btn-icon-danger confirm-delete"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="{{ $modalTarget }}"
        {{ $attributes->merge([
            'class' => 'admin-btn admin-btn-icon admin-btn-icon-danger',
        ]) }}
    >
        @if(!$slot->isEmpty())
            {{ $slot }}
        @else
            <i class="{{ $iconClass }}" aria-hidden="true"></i>
        @endif
    </a>
@endif
