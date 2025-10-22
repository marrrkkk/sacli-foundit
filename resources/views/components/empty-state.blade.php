@props([
    'icon' => 'inbox',
    'title' => 'No items found',
    'message' => 'There are no items to display',
    'actionText' => null,
    'actionUrl' => null,
    'actionIcon' => null,
])

<div {{ $attributes->merge(['class' => 'text-center py-12 px-4']) }}>
    <!-- Icon Container -->
    <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
        <x-icon :name="$icon" size="xl" class="text-gray-400" />
    </div>

    <!-- Title -->
    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $title }}</h3>

    <!-- Message -->
    <p class="text-gray-600 mb-6 max-w-md mx-auto">{{ $message }}</p>

    <!-- Optional Action Button -->
    @if ($actionText && $actionUrl)
        <a href="{{ $actionUrl }}">
            <x-primary-button :icon="$actionIcon">
                {{ $actionText }}
            </x-primary-button>
        </a>
    @endif

    <!-- Optional Slot for Custom Actions -->
    @if ($slot->isNotEmpty())
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
