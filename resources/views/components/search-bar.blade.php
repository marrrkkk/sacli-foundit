@props(['placeholder' => 'Search...', 'value' => '', 'name' => 'query', 'showFilter' => false])

<div class="relative w-full">
    <div class="relative">
        <!-- Search Icon -->
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <x-icon name="magnifying-glass" size="md" class="text-gray-400" />
        </div>

        <!-- Search Input -->
        <input type="text" name="{{ $name }}"
            {{ $attributes->merge([
                'class' =>
                    'block w-full pl-12 pr-12 py-3.5 text-base border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 transition-all duration-200 focus:shadow-md',
                'placeholder' => $placeholder,
                'value' => $value,
            ]) }}>

        <!-- Clear Button (shown when there's a value) -->
        @if ($value)
            <button type="button" onclick="this.previousElementSibling.value = ''; this.closest('form')?.submit();"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200"
                aria-label="Clear search">
                <x-icon name="x-circle" size="md" />
            </button>
        @endif
    </div>

    <!-- Filter Button (optional) -->
    @if ($showFilter)
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
            <button type="button" onclick="document.getElementById('filter-sidebar')?.classList.toggle('hidden')"
                class="p-2 text-gray-400 hover:text-sacli-green-600 hover:bg-sacli-green-50 rounded-lg transition-all duration-200"
                aria-label="Toggle filters">
                <x-icon name="funnel" size="md" />
            </button>
        </div>
    @endif
</div>
