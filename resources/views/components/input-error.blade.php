@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 mt-2']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center gap-1.5">
                <x-icon name="exclamation-circle" size="xs" class="flex-shrink-0" />
                <span>{{ $message }}</span>
            </li>
        @endforeach
    </ul>
@endif
