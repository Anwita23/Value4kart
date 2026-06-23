@props([
    'href' => '#',
    'url' => null,
    'title' => __('Edit'),
    'iconClass' => 'fa fa-edit',
])

@php
    $url = $url ?? $href;
@endphp

<a
    href="{{ $url }}"
    title="{{ $title }}"
    aria-label="{{ $title }}"
    {{ $attributes->merge([
        'class' => 'admin-btn admin-btn-icon',
    ]) }}
>
    @if(!$slot->isEmpty())
        {{ $slot }}
    @else
        <i class="{{ $iconClass }}" aria-hidden="true"></i>
    @endif
</a>
