@props(['status'])

@php
    $statusConfig = [
        'pending' => [
            'color' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'icon' => 'clock',
        ],
        'verified' => [
            'color' => 'bg-sacli-green-100 text-sacli-green-800 border-sacli-green-200',
            'icon' => 'check-circle',
        ],
        'rejected' => [
            'color' => 'bg-red-100 text-red-800 border-red-200',
            'icon' => 'x-circle',
        ],
        'resolved' => [
            'color' => 'bg-blue-100 text-blue-800 border-blue-200',
            'icon' => 'check-badge',
        ],
    ];

    $config = $statusConfig[$status] ?? $statusConfig['pending'];
@endphp

<span
    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border {{ $config['color'] }} transition-all duration-200">
    <x-icon :name="$config['icon']" size="xs" />
    {{ ucfirst($status) }}
</span>
