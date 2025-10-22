@props(['title', 'value', 'icon', 'trend' => null, 'color' => 'green'])

@php
    $colorClasses = [
        'green' => 'from-sacli-green-500 to-sacli-green-600',
        'blue' => 'from-blue-500 to-blue-600',
        'purple' => 'from-purple-500 to-purple-600',
        'orange' => 'from-orange-500 to-orange-600',
    ];
@endphp

<div
    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 ease-in-out">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-600 mb-1">{{ $title }}</p>
                <p class="text-3xl font-bold text-gray-900">{{ $value }}</p>

                @if ($trend)
                    <div class="flex items-center gap-1 mt-2">
                        <x-icon :name="$trend > 0 ? 'arrow-trending-up' : 'arrow-trending-down'" size="sm" :class="$trend > 0 ? 'text-green-600' : 'text-red-600'" />
                        <span class="text-sm font-medium {{ $trend > 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ abs($trend) }}%
                        </span>
                        <span class="text-sm text-gray-500">vs last month</span>
                    </div>
                @endif
            </div>

            <div
                class="w-16 h-16 rounded-xl bg-gradient-to-br {{ $colorClasses[$color] }} flex items-center justify-center shadow-lg">
                <x-icon :name="$icon" size="xl" class="text-white" />
            </div>
        </div>
    </div>
</div>
