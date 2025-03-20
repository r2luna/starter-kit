@props(['active' => false, 'icon' => null])

@php
    $classes =
        $active ?? false
            ? 'flex items-center px-3 py-2 text-sm font-medium text-primary-700 bg-primary-50 rounded-md group transition-colors'
            : 'flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 rounded-md group transition-colors';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if ($icon)
        <x-icon name="{{ $icon }}"
            class="{{ $active ? 'text-primary-700' : 'text-gray-400 group-hover:text-primary-700' }} w-5 h-5 mr-3" />
    @endif
    <span>{{ $slot }}</span>
</a>
