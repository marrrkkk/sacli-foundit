@props(['disabled' => false, 'icon' => null, 'iconPosition' => 'left', 'hasError' => false, 'hasSuccess' => false])

@php
    $borderClass = 'border-gray-300 focus:border-sacli-green-500 focus:ring-sacli-green-500';
    $iconColor = 'text-gray-400';

    if ($hasError) {
        $borderClass = 'border-red-300 focus:border-red-500 focus:ring-red-500';
        $iconColor = 'text-red-500';
    } elseif ($hasSuccess) {
        $borderClass = 'border-green-300 focus:border-green-500 focus:ring-green-500';
        $iconColor = 'text-green-500';
    }
@endphp

<div class="relative">
    @if ($icon && $iconPosition === 'left')
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <x-icon :name="$icon" size="sm" :class="$iconColor" />
        </div>
    @endif

    <input @disabled($disabled)
        {{ $attributes->merge([
            'class' =>
                "block w-full {$borderClass} focus:ring-2 rounded-md shadow-sm transition-all duration-200 " .
                ($icon && $iconPosition === 'left' ? 'pl-10 ' : '') .
                ($icon && $iconPosition === 'right' ? 'pr-10 ' : '') .
                ($hasError || $hasSuccess ? 'pr-10' : ''),
        ]) }}>

    @if ($icon && $iconPosition === 'right')
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <x-icon :name="$icon" size="sm" :class="$iconColor" />
        </div>
    @elseif($hasError)
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <x-icon name="exclamation-circle" size="sm" class="text-red-500" />
        </div>
    @elseif($hasSuccess)
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <x-icon name="check-circle" size="sm" class="text-green-500" />
        </div>
    @endif
</div>
