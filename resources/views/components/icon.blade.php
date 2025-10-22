@props(['name', 'type' => 'outline', 'size' => 'md'])

@php
    $sizes = ['xs' => '12', 'sm' => '16', 'md' => '20', 'lg' => '24', 'xl' => '32'];
    $iconSize = $sizes[$size] ?? '20';

    // Map type to iconify style
    $styleMap = [
        'outline' => 'outline',
        'solid' => 'solid',
        'mini' => 'mini',
        'o' => 'outline',
        's' => 'solid',
        'm' => 'mini',
    ];
    $style = $styleMap[$type] ?? 'outline';

    // Convert heroicon name format
    $iconName = "heroicons:{$name}";
    if ($style === 'solid') {
        $iconName = "heroicons-solid:{$name}";
    }
@endphp

<iconify-icon icon="{{ $iconName }}" width="{{ $iconSize }}" height="{{ $iconSize }}"
    {{ $attributes }}></iconify-icon>
