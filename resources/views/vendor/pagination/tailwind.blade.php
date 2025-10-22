@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-lg">
                    <x-icon name="chevron-left" size="sm" />
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-lg hover:bg-gray-50 hover:border-sacli-green-400 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 active:bg-gray-100 transition-all duration-200">
                    <x-icon name="chevron-left" size="sm" />
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center gap-2 px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-lg hover:bg-gray-50 hover:border-sacli-green-400 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 active:bg-gray-100 transition-all duration-200">
                    {!! __('pagination.next') !!}
                    <x-icon name="chevron-right" size="sm" />
                </a>
            @else
                <span
                    class="relative inline-flex items-center gap-2 px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-lg">
                    {!! __('pagination.next') !!}
                    <x-icon name="chevron-right" size="sm" />
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse gap-1">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default rounded-lg leading-5"
                                aria-hidden="true">
                                <x-icon name="chevron-left" size="sm" />
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg leading-5 hover:bg-gray-50 hover:border-sacli-green-400 hover:text-sacli-green-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 active:bg-gray-100 transition-all duration-200"
                            aria-label="{{ __('pagination.previous') }}">
                            <x-icon name="chevron-left" size="sm" />
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 rounded-lg">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-sacli-green-600 border border-sacli-green-600 cursor-default leading-5 rounded-lg shadow-sm">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-lg hover:bg-gray-50 hover:border-sacli-green-400 hover:text-sacli-green-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 active:bg-gray-100 transition-all duration-200"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg leading-5 hover:bg-gray-50 hover:border-sacli-green-400 hover:text-sacli-green-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 active:bg-gray-100 transition-all duration-200"
                            aria-label="{{ __('pagination.next') }}">
                            <x-icon name="chevron-right" size="sm" />
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default rounded-lg leading-5"
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
