@props(['icon' => null, 'iconPosition' => 'left', 'tag' => 'button'])

@php
    $classes =
        'inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-sacli-green-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-sacli-green-700 focus:bg-sacli-green-700 active:bg-sacli-green-800 active:scale-95 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-sm hover:shadow-md';
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
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        @if ($icon && $iconPosition === 'left')
            <x-icon :name="$icon" size="sm" />
        @endif

        {{ $slot }}

        @if ($icon && $iconPosition === 'right')
            <x-icon :name="$icon" size="sm" />
        @endif
    </button>
@endif
