@props([
    'href' => null,
    'label' => __('Cancel'),
    'dismiss' => false,
])

@if($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge([
            'class' => 'admin-btn admin-btn-cancel',
        ]) }}
    >
        @if($slot->isEmpty())
            {{ $label }}
        @else
            {{ $slot }}
        @endif
    </a>
@else
    <button
        type="button"
        @if($dismiss) data-bs-dismiss="modal" @endif
        {{ $attributes->merge([
            'class' => 'admin-btn admin-btn-cancel',
        ]) }}
    >
        {{ $label }}
    </button>
@endif
