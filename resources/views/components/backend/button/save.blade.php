@props([
    'label' => __('Save'),
    'type' => 'submit',
    'size' => null,
    'variant' => 'primary',
])

@php
    $variantClass = $variant === 'danger' ? 'admin-btn-danger' : 'admin-btn-primary';
    $btnClass = 'admin-btn ' . $variantClass;
    if ($size === 'sm') {
        $btnClass .= ' admin-btn-sm';
    }
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => $btnClass,
    ]) }}
>
    {{ $slot->isEmpty() ? '' : $slot }}
    {{ $label }}
</button>
