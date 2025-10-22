@props(['active', 'icon' => null])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center gap-2 px-4 py-2 border-b-2 border-sacli-green-600 text-sm font-medium leading-5 text-sacli-green-600 focus:outline-none focus:border-sacli-green-700 transition-all duration-200 ease-in-out rounded-t-lg bg-sacli-green-50'
            : 'inline-flex items-center gap-2 px-4 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-600 hover:text-gray-900 hover:border-gray-300 focus:outline-none focus:text-gray-900 focus:border-gray-300 transition-all duration-200 ease-in-out rounded-t-lg hover:bg-gray-50';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <x-icon :name="$icon" size="sm" />
    @endif
    {{ $slot }}
</a>
