@props(['icon' => null, 'iconPosition' => 'left', 'tag' => 'button'])

@php
    $classes =
        'inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border-2 border-sacli-green-600 rounded-lg font-semibold text-sm text-sacli-green-600 hover:bg-sacli-green-50 hover:shadow-sm focus:bg-sacli-green-50 active:bg-sacli-green-100 active:scale-95 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 focus:ring-offset-2 disabled:opacity-25 transition-all duration-200 ease-in-out';
@endphp

@if ($tag === 'a')
    <a {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon && $iconPosition === 'left')
            <x-icon :name="$icon" size="sm" />
        @endif

        {{ $slot }}

        @if ($icon && $iconPosition === 'right')
            <x-icon :name="$icon" size="sm" />
        @endif
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}>
        @if ($icon && $iconPosition === 'left')
            <x-icon :name="$icon" size="sm" />
        @endif

        {{ $slot }}

        @if ($icon && $iconPosition === 'right')
            <x-icon :name="$icon" size="sm" />
        @endif
    </button>
@endif
