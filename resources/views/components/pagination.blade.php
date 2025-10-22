@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        <!-- Mobile Pagination -->
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default leading-5 rounded-lg">
                    <x-icon name="chevron-left" size="sm" />
                    <span>Previous</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="relative inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-lg hover:text-sacli-green-600 hover:border-sacli-green-300 hover:bg-sacli-green-50 focus:outline-none focus:ring-2 focus:ring-sacli-green-300 focus:border-sacli-green-300 active:bg-gray-100 active:text-gray-700 transition-all duration-150 ease-in-out">
                    <x-icon name="chevron-left" size="sm" />
                    <span>Previous</span>
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="relative inline-flex items-center gap-2 px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-lg hover:text-sacli-green-600 hover:border-sacli-green-300 hover:bg-sacli-green-50 focus:outline-none focus:ring-2 focus:ring-sacli-green-300 focus:border-sacli-green-300 active:bg-gray-100 active:text-gray-700 transition-all duration-150 ease-in-out">
                    <span>Next</span>
                    <x-icon name="chevron-right" size="sm" />
                </a>
            @else
                <span
                    class="relative inline-flex items-center gap-2 px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default leading-5 rounded-lg">
                    <span>Next</span>
                    <x-icon name="chevron-right" size="sm" />
                </span>
            @endif
        </div>

        <!-- Desktop Pagination -->
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    of
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-lg">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="Previous">
                            <span
                                class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default rounded-l-lg leading-5"
                                aria-hidden="true">
                                <x-icon name="chevron-left" size="sm" />
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-lg leading-5 hover:text-sacli-green-600 hover:bg-sacli-green-50 hover:border-sacli-green-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring-sacli-green-300 focus:border-sacli-green-300 active:bg-gray-100 active:text-gray-700 transition-all duration-150 ease-in-out"
                            aria-label="Previous">
                            <x-icon name="chevron-left" size="sm" />
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-semibold text-white bg-sacli-green-600 border border-sacli-green-600 cursor-default leading-5 shadow-sm">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-sacli-green-600 hover:bg-sacli-green-50 hover:border-sacli-green-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring-sacli-green-300 focus:border-sacli-green-300 active:bg-gray-100 active:text-gray-700 transition-all duration-150 ease-in-out"
                                        aria-label="Go to page {{ $page }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-lg leading-5 hover:text-sacli-green-600 hover:bg-sacli-green-50 hover:border-sacli-green-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring-sacli-green-300 focus:border-sacli-green-300 active:bg-gray-100 active:text-gray-700 transition-all duration-150 ease-in-out"
                            aria-label="Next">
                            <x-icon name="chevron-right" size="sm" />
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="Next">
                            <span
                                class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default rounded-r-lg leading-5"
                                aria-hidden="true">
                                <x-icon name="chevron-right" size="sm" />
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
