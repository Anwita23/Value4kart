@props([
    'label' => __('Delete'),
    'type' => 'button',
    'modalTarget' => null,
    'size' => null,
])

@php
    $btnClass = 'admin-btn admin-btn-danger';
    if ($size === 'sm') {
        $btnClass .= ' admin-btn-sm';
    }
@endphp

<button
    type="{{ $type }}"
    @if($modalTarget) data-bs-toggle="modal" data-bs-target="{{ $modalTarget }}" @endif
    {{ $attributes->merge([
        'class' => $btnClass,
    ]) }}
>
    @if(!$slot->isEmpty())
        {{ $slot }}
    @else
        <i class="feather icon-trash-2" aria-hidden="true"></i>
    @endif
    <span>{{ $label }}</span>
</button>
