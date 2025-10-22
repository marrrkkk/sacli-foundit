<x-public-layout>
    <x-slot name="title">Browse Items</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Browse Items</h1>
            <p class="text-gray-600">
                @if ($selectedCategory)
                    Showing items in {{ $selectedCategory->name }} category
                @else
                    Browse all lost and found items by category
                @endif
            </p>
        </div>

        <!-- Category Filter Tabs -->
        <div class="mb-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 overflow-x-auto">
                    <a href="{{ route('browse') }}"
                        class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition duration-150 ease-in-out flex items-center gap-2 {{ !request('category') ? 'border-sacli-green-600 text-sacli-green-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        <x-icon name="squares-2x2" size="sm" />
                        All Categories
                    </a>
                    @php
                        $categoryIcons = [
                            'Electronics' => 'device-phone-mobile',
                            'Clothing' => 'shopping-bag',
                            'Documents' => 'document-text',
                            'Keys' => 'key',
                            'Jewelry' => 'sparkles',
                            'Books & Media' => 'book-open',
                            'Sports Equipment' => 'trophy',
                            'Personal Items' => 'briefcase',
                            'Pets' => 'heart',
                            'Other' => 'cube',
                        ];
                    @endphp
                    @foreach ($categories as $category)
                        <a href="{{ route('browse', ['category' => $category->id]) }}"
                            class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm flex items-center gap-2 transition duration-150 ease-in-out {{ request('category') == $category->id ? 'border-sacli-green-600 text-sacli-green-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                            <x-icon :name="$categoryIcons[$category->name] ?? 'cube'" size="sm" />
                            {{ $category->name }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:w-64 flex-shrink-0">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <x-icon name="funnel" size="md" class="text-sacli-green-600" />
                        Filters
                    </h3>

                    <form action="{{ route('browse') }}" method="GET" id="filter-form">
                        <!-- Preserve category -->
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        <!-- Item Type Filter -->
                        <div class="mb-6">
                            <h4 class="font-medium text-gray-900 mb-3 flex items-center gap-2">
                                <x-icon name="tag" size="sm" class="text-gray-400" />
                                Item Type
                            </h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="type" value=""
                                        class="text-sacli-green-600 focus:ring-sacli-green-500"
                                        {{ !request('type') ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700">All Items</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="type" value="lost"
                                        class="text-sacli-green-600 focus:ring-sacli-green-500"
                                        {{ request('type') === 'lost' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700 flex items-center gap-1.5">
                                        <x-icon name="exclamation-circle" size="xs" class="text-red-500" />
                                        Lost Items
                                    </span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="type" value="found"
                                        class="text-sacli-green-600 focus:ring-sacli-green-500"
                                        {{ request('type') === 'found' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700 flex items-center gap-1.5">
                                        <x-icon name="check-circle" size="xs" class="text-sacli-green-600" />
                                        Found Items
                                    </span>
                                </label>
                            </div>
                        </div>

                        <!-- Date Range Filter -->
                        <div class="mb-6">
                            <h4 class="font-medium text-gray-900 mb-3 flex items-center gap-2">
                                <x-icon name="calendar" size="sm" class="text-gray-400" />
                                Date Range
                            </h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">From</label>
                                    <input type="date" name="date_from" value="{{ request('date_from') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 outline-none text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">To</label>
                                    <input type="date" name="date_to" value="{{ request('date_to') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 outline-none text-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Location Filter -->
                        <div class="mb-6">
                            <h4 class="font-medium text-gray-900 mb-3 flex items-center gap-2">
                                <x-icon name="map-pin" size="sm" class="text-gray-400" />
                                Location
                            </h4>
                            <input type="text" name="location" placeholder="Enter location..."
                                value="{{ request('location') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 outline-none text-sm">
                        </div>

                        <!-- Status Filter -->
                        <div class="mb-6">
                            <h4 class="font-medium text-gray-900 mb-3 flex items-center gap-2">
                                <x-icon name="check-badge" size="sm" class="text-gray-400" />
                                Status
                            </h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="status[]" value="verified"
                                        class="text-sacli-green-600 focus:ring-sacli-green-500 rounded"
                                        {{ in_array('verified', request('status', [])) ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700 flex items-center gap-1.5">
                                        <x-icon name="check-circle" size="xs" class="text-sacli-green-600" />
                                        Verified
                                    </span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="status[]" value="resolved"
                                        class="text-sacli-green-600 focus:ring-sacli-green-500 rounded"
                                        {{ in_array('resolved', request('status', [])) ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700 flex items-center gap-1.5">
                                        <x-icon name="check-badge" size="xs" class="text-blue-600" />
                                        Resolved
                                    </span>
                                </label>
                            </div>
                        </div>

                        <!-- Filter Actions -->
                        <div class="space-y-2">
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 bg-sacli-green-600 hover:bg-sacli-green-700 text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                                <x-icon name="check" size="sm" />
                                Apply Filters
                            </button>
                            <a href="{{ route('browse', request('category') ? ['category' => request('category')] : []) }}"
                                class="w-full inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium transition-all duration-200 text-center">
                                <x-icon name="x-mark" size="sm" />
                                Clear Filters
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Items Content -->
            <div class="flex-1">
                <!-- Sort and View Options -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-gray-600 flex items-center gap-1.5">
                            <x-icon name="document-text" size="sm" class="text-gray-400" />
                            {{ isset($items) ? $items->total() : 0 }} items found
                        </span>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600 flex items-center gap-1.5">
                                <x-icon name="arrows-up-down" size="sm" class="text-gray-400" />
                                Sort by:
                            </span>
                            <select name="sort" onchange="updateSort(this.value)"
                                class="px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 outline-none text-sm">
                                <option value="newest" {{ request('sort', 'newest') === 'newest' ? 'selected' : '' }}>
                                    Newest First</option>
                                <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Oldest
                                    First</option>
                                <option value="category" {{ request('sort') === 'category' ? 'selected' : '' }}>By
                                    Category</option>
                                <option value="location" {{ request('sort') === 'location' ? 'selected' : '' }}>By
                                    Location</option>
                            </select>
                        </div>
                    </div>

                    <!-- View Toggle -->
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-600">View:</span>
                        <button onclick="toggleView('grid')" id="grid-view-btn"
                            class="p-2 rounded-lg bg-sacli-green-600 text-white hover:bg-sacli-green-700 transition-all duration-200"
                            title="Grid View">
                            <x-icon name="squares-2x2" size="sm" />
                        </button>
                        <button onclick="toggleView('list')" id="list-view-btn"
                            class="p-2 rounded-lg bg-gray-200 text-gray-600 hover:bg-gray-300 transition-all duration-200"
                            title="List View">
                            <x-icon name="bars-3" size="sm" />
                        </button>
                    </div>
                </div>

                <!-- Items Grid/List -->
                @if (isset($items) && $items->count() > 0)
                    <div id="results-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($items as $item)
                            <a href="{{ route('items.show', $item->id) }}" class="block">
                                <x-item-card :item="$item" />
                            </a>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if (method_exists($items, 'links'))
                        <div class="mt-8">
                            {{ $items->appends(request()->query())->links() }}
                        </div>
                    @endif
                @else
                    <!-- No Results -->
                    <x-empty-state icon="inbox" title="No items found">
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">
                            @if (request()->hasAny(['category', 'type', 'location', 'date_from', 'date_to', 'status']))
                                No items match your current filters. Try adjusting your search criteria.
                            @else
                                No items have been reported in this category yet. Be the first to report an item!
                            @endif
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="{{ route('browse') }}"
                                class="inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg font-medium transition-all duration-200">
                                <x-icon name="arrow-path" size="sm" />
                                View All Items
                            </a>
                            @auth
                                <a href="{{ route('items.create') }}"
                                    class="inline-flex items-center justify-center gap-2 bg-sacli-green-600 hover:bg-sacli-green-700 text-white px-6 py-2.5 rounded-lg font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                                    <x-icon name="plus-circle" size="sm" />
                                    Report an Item
                                </a>
                            @endauth
                        </div>
                    </x-empty-state>
                @endif
            </div>
        </div>
    </div>

    <script>
        function updateSort(value) {
            const url = new URL(window.location);
            url.searchParams.set('sort', value);
            window.location.href = url.toString();
        }

        function toggleView(view) {
            const container = document.getElementById('results-container');
            const gridBtn = document.getElementById('grid-view-btn');
            const listBtn = document.getElementById('list-view-btn');

            if (view === 'grid') {
                container.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';
                gridBtn.className =
                    'p-2 rounded-lg bg-sacli-green-600 text-white hover:bg-sacli-green-700 transition-all duration-200';
                listBtn.className =
                'p-2 rounded-lg bg-gray-200 text-gray-600 hover:bg-gray-300 transition-all duration-200';
            } else {
                container.className = 'space-y-4';
                gridBtn.className =
                'p-2 rounded-lg bg-gray-200 text-gray-600 hover:bg-gray-300 transition-all duration-200';
                listBtn.className =
                    'p-2 rounded-lg bg-sacli-green-600 text-white hover:bg-sacli-green-700 transition-all duration-200';
            }
        }
    </script>
</x-public-layout>
