@props(['status'])

@if ($status)
    <x-flash-message type="success" {{ $attributes->merge(['class' => 'mb-4']) }}>
        <p class="font-medium text-sm">{{ $status }}</p>
    </x-flash-message>
@endif
