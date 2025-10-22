<x-public-layout>
    <x-slot name="title">Home</x-slot>

    <!-- Hero Section -->
    <div
        class="relative bg-gradient-to-br from-sacli-green-50 via-white to-sacli-green-50 overflow-hidden rounded-3xl mx-4 sm:mx-6 lg:mx-8 mt-4">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="#10B981" stroke-width="0.5" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="text-center">
                <div class="mb-8">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-sacli-green-100 text-sacli-green-800 rounded-full text-sm font-medium mb-4">
                        <x-icon name="check-badge" size="sm" class="w-4 h-4" />
                        Trusted by SACLI Community
                    </div>
                </div>

                <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    Lost Something?
                    <span class="text-sacli-green-600 block lg:inline">Found Something?</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
                    SACLI FOUNDIT helps reunite people with their belongings through our comprehensive lost and found
                    platform.
                    Search verified items or report what you've lost or found.
                </p>

                <!-- Search Form -->
                <div class="max-w-2xl mx-auto mb-8">
                    <form action="{{ route('search') }}" method="GET">
                        <x-search-bar name="query" placeholder="Search for lost or found items..."
                            :value="request('query')" />
                    </form>
                </div>

                <!-- Quick Actions -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <x-secondary-button :href="route('items.create', ['type' => 'lost'])" icon="exclamation-circle" tag="a">
                            Report Lost Item
                        </x-secondary-button>
                        <x-primary-button :href="route('items.create', ['type' => 'found'])" icon="check-circle" tag="a">
                            Report Found Item
                        </x-primary-button>
                    @else
                        <x-primary-button :href="route('register')" icon="user-plus" tag="a">
                            Register to Report Items
                        </x-primary-button>
                        <x-secondary-button :href="route('browse')" icon="squares-2x2" tag="a">
                            Browse Items
                        </x-secondary-button>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Browse by Category</h2>
            <p class="text-lg text-gray-600">Find items by category to narrow down your search</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
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

            @foreach (collect($categories)->take(6) as $category)
                <a href="{{ route('browse', ['category' => $category->id]) }}" class="group">
                    <div
                        class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-lg hover:border-sacli-green-400 hover:-translate-y-1 transition-all duration-300 text-center">
                        <div
                            class="w-12 h-12 mx-auto mb-3 bg-sacli-green-100 rounded-lg flex items-center justify-center group-hover:bg-sacli-green-600 transition-colors duration-300">
                            <x-icon :name="$categoryIcons[$category->name] ?? 'cube'" size="lg"
                                class="text-sacli-green-600 group-hover:text-white transition-colors duration-300" />
                        </div>
                        <h3
                            class="font-semibold text-gray-900 group-hover:text-sacli-green-600 transition-colors duration-200">
                            {{ $category->name }}
                        </h3>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Recent Items Section -->
    <div class="bg-gray-50 rounded-3xl mx-4 sm:mx-6 lg:mx-8 my-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Recently Reported Items</h2>
                <p class="text-lg text-gray-600">Latest verified items in our database</p>
            </div>

            <!-- Recent items grid -->
            @if ($recentItems && $recentItems->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($recentItems as $item)
                        <a href="{{ route('items.show', $item->id) }}" class="block">
                            <x-item-card :item="$item" />
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <x-icon name="inbox" size="xl" class="text-gray-400" />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No items yet</h3>
                    <p class="text-gray-600 mb-6">Be the first to report a lost or found item!</p>
                    @auth
                        <x-primary-button :href="route('items.create')" icon="plus-circle" tag="a">
                            Report an Item
                        </x-primary-button>
                    @else
                        <x-primary-button :href="route('register')" icon="user-plus" tag="a">
                            Register to Report Items
                        </x-primary-button>
                    @endauth
                </div>
            @endif

            <div class="text-center mt-12">
                <x-primary-button :href="route('browse')" icon="squares-2x2" tag="a" class="text-lg px-8 py-3">
                    View All Items
                </x-primary-button>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
            <p class="text-lg text-gray-600">Simple steps to help reunite people with their belongings</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-sacli-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <x-icon name="magnifying-glass" size="xl" class="text-sacli-green-600" />
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Search</h3>
                <p class="text-gray-600">Search our database of found items or browse by category to find what you're
                    looking for.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-sacli-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <x-icon name="document-text" size="xl" class="text-sacli-green-600" />
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Report</h3>
                <p class="text-gray-600">Register and report lost or found items with detailed descriptions and photos.
                </p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-sacli-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <x-icon name="hand-raised" size="xl" class="text-sacli-green-600" />
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Reunite</h3>
                <p class="text-gray-600">Connect with item owners or finders through our secure contact system.</p>
            </div>
        </div>
    </div>
</x-public-layout>
