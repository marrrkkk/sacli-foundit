@props(['icon' => null, 'iconPosition' => 'left'])

<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-red-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-red-700 focus:bg-red-700 active:bg-red-800 active:scale-95 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-sm hover:shadow-md',
    ]) }}>
    @if ($icon && $iconPosition === 'left')
        <x-icon :name="$icon" size="sm" class="text-white" />
    @endif

    {{ $slot }}

    @if ($icon && $iconPosition === 'right')
        <x-icon :name="$icon" size="sm" class="text-white" />
    @endif
</button>
