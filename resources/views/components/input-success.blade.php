@props(['message'])

@if ($message)
    <p {{ $attributes->merge(['class' => 'mt-2 text-sm text-green-600 flex items-center gap-1.5']) }}>
        <x-icon name="check-circle" size="xs" class="flex-shrink-0" />
        <span>{{ $message }}</span>
    </p>
@endif
