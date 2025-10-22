@props(['size' => 'md', 'message' => ''])

@php
    $sizeClasses = [
        'sm' => 'w-6 h-6',
        'md' => 'w-10 h-10',
        'lg' => 'w-16 h-16',
        'xl' => 'w-20 h-20',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center']) }}>
    <div class="relative {{ $sizeClasses[$size] ?? $sizeClasses['md'] }}">
        <!-- Spinning circle -->
        <svg class="animate-spin text-sacli-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
    </div>

    @if ($message)
        <p class="mt-3 text-sm text-gray-600 font-medium">{{ $message }}</p>
    @endif
</div>
