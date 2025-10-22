@props(['lines' => 8])

<div id="page-skeleton-overlay" class="fixed inset-0 z-40 hidden">
    <div class="absolute inset-0 bg-white/70 backdrop-blur-sm"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="space-y-4 animate-pulse">
            <div class="h-8 bg-gray-200 rounded-lg w-2/3"></div>
            <div class="h-4 bg-gray-200 rounded w-1/2"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                @for ($i = 0; $i < $lines; $i++)
                    <div class="bg-white rounded-2xl border border-gray-200 p-5 shadow-sm">
                        <div class="h-40 bg-gray-200 rounded-xl mb-4"></div>
                        <div class="h-5 bg-gray-200 rounded w-3/4 mb-3"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                        <div class="mt-4 flex items-center gap-3">
                            <div class="h-4 bg-gray-200 rounded w-16"></div>
                            <div class="h-4 bg-gray-200 rounded w-20"></div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <style>
        @keyframes skeleton-shimmer {
            0% { opacity: .6; }
            50% { opacity: .9; }
            100% { opacity: .6; }
        }
        .animate-pulse > * { animation: skeleton-shimmer 1.5s ease-in-out infinite; }
    </style>
</div>


