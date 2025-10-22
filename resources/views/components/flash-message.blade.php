@props(['type' => 'info'])

@php
    $config = [
        'success' => [
            'bg' => 'bg-green-50',
            'border' => 'border-green-200',
            'text' => 'text-green-800',
            'icon' => 'check-circle',
            'iconColor' => 'text-green-600',
        ],
        'error' => [
            'bg' => 'bg-red-50',
            'border' => 'border-red-200',
            'text' => 'text-red-800',
            'icon' => 'x-circle',
            'iconColor' => 'text-red-600',
        ],
        'warning' => [
            'bg' => 'bg-yellow-50',
            'border' => 'border-yellow-200',
            'text' => 'text-yellow-800',
            'icon' => 'exclamation-triangle',
            'iconColor' => 'text-yellow-600',
        ],
        'info' => [
            'bg' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'text' => 'text-blue-800',
            'icon' => 'information-circle',
            'iconColor' => 'text-blue-600',
        ],
    ];

    $styles = $config[$type] ?? $config['info'];
@endphp

<div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    {{ $attributes->merge(['class' => "rounded-lg border-2 p-4 {$styles['bg']} {$styles['border']}"]) }}>
    <div class="flex items-start gap-3">
        <div class="flex-shrink-0">
            <x-icon :name="$styles['icon']" size="md" :class="$styles['iconColor']" />
        </div>
        <div class="flex-1 {{ $styles['text'] }}">
            {{ $slot }}
        </div>
        <button @click="show = false" type="button"
            class="flex-shrink-0 {{ $styles['iconColor'] }} hover:opacity-70 transition-opacity rounded-md p-1 hover:bg-white/50">
            <x-icon name="x-mark" size="sm" />
        </button>
    </div>
</div>
