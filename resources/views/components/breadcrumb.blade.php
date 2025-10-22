@props(['items' => []])

@if (count($items) > 0)
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <!-- Home Link -->
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-gray-700 hover:text-sacli-green-600 hover:bg-sacli-green-50 rounded-lg transition-all duration-200">
                    <x-icon name="home" size="sm" />
                    <span>Home</span>
                </a>
            </li>

            @foreach ($items as $index => $item)
                <li class="inline-flex items-center">
                    <!-- Separator Icon -->
                    <x-icon name="chevron-right" size="sm" class="text-gray-400 mx-1" />

                    @if ($index === count($items) - 1)
                        <!-- Last item (current page) -->
                        <span
                            class="px-3 py-1.5 text-sm font-semibold text-sacli-green-600 bg-sacli-green-50 rounded-lg"
                            aria-current="page">
                            {{ $item['title'] }}
                        </span>
                    @else
                        <!-- Intermediate items -->
                        <a href="{{ $item['url'] }}"
                            class="px-3 py-1.5 text-sm font-medium text-gray-700 hover:text-sacli-green-600 hover:bg-sacli-green-50 rounded-lg transition-all duration-200">
                            {{ $item['title'] }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
