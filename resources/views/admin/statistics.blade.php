<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-sacli-green-500 to-sacli-green-600 rounded-lg flex items-center justify-center shadow-md">
                    <x-icon name="chart-bar" size="md" class="text-white" />
                </div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Statistics & Analytics') }}
                </h2>
            </div>
            <div class="flex gap-3">
                <x-secondary-button onclick="refreshStatistics()" icon="arrow-path">
                    Refresh
                </x-secondary-button>
                <div class="relative">
                    <x-primary-button onclick="toggleExportMenu()" icon="arrow-down-tray">
                        Export
                    </x-primary-button>
                    <div id="exportMenu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10 border border-gray-200">
                        <div class="py-1">
                            <a href="{{ route('admin.statistics.export', ['format' => 'json']) }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-lg transition-colors">
                                <x-icon name="document-text" size="sm" class="text-gray-400" />
                                Export as JSON
                            </a>
                            <a href="{{ route('admin.statistics.export', ['format' => 'csv']) }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-b-lg transition-colors">
                                <x-icon name="table-cells" size="sm" class="text-gray-400" />
                                Export as CSV
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Overview Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Items -->
                <x-stat-card title="Total Items" :value="number_format($overviewStats['total_items'])" icon="archive-box" color="green">
                    <x-slot name="footer">
                        <p class="text-xs text-gray-500 mt-1">All time</p>
                    </x-slot>
                </x-stat-card>

                <!-- Verification Rate -->
                <x-stat-card title="Verification Rate" :value="number_format($successMetrics['verification_rate'], 1) . '%'" icon="check-circle" color="blue">
                    <x-slot name="footer">
                        <p class="text-xs text-gray-500 mt-1">Items approved</p>
                    </x-slot>
                </x-stat-card>

                <!-- Resolution Rate -->
                <x-stat-card title="Resolution Rate" :value="number_format($successMetrics['resolution_rate'], 1) . '%'" icon="sparkles" color="purple">
                    <x-slot name="footer">
                        <p class="text-xs text-gray-500 mt-1">Items resolved</p>
                    </x-slot>
                </x-stat-card>

                <!-- Pending Queue -->
                <x-stat-card title="Pending Queue" :value="number_format($performanceMetrics['pending_queue_size'])" icon="clock" color="orange">
                    <x-slot name="footer">
                        <p class="text-xs text-gray-500 mt-1">
                            {{ number_format($performanceMetrics['avg_pending_time_hours'], 1) }}h avg wait</p>
                    </x-slot>
                </x-stat-card>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Submission Trends Chart -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-2">
                                <x-icon name="chart-bar-square" size="md" class="text-sacli-green-600" />
                                <h3 class="text-lg font-medium text-gray-900">Submission Trends (Last 90 Days)</h3>
                            </div>
                            <div class="flex gap-2">
                                <button onclick="updateTrendChart(30)"
                                    class="px-3 py-1 text-xs bg-sacli-green-100 text-sacli-green-700 rounded-lg hover:bg-sacli-green-200 transition-colors">30d</button>
                                <button onclick="updateTrendChart(60)"
                                    class="px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">60d</button>
                                <button onclick="updateTrendChart(90)"
                                    class="px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">90d</button>
                            </div>
                        </div>
                        <div class="h-64 rounded-lg">
                            <canvas id="submissionTrendsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Category Distribution Chart -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <x-icon name="chart-pie" size="md" class="text-sacli-green-600" />
                            <h3 class="text-lg font-medium text-gray-900">Items by Category</h3>
                        </div>
                        <div class="h-64 rounded-lg">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Metrics and Success Rates -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Success Metrics -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <x-icon name="trophy" size="md" class="text-sacli-green-600" />
                            <h3 class="text-lg font-medium text-gray-900">Success Metrics</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Overall Success Rate</span>
                                <span
                                    class="text-lg font-semibold text-sacli-green-600">{{ number_format($successMetrics['overall_success_rate'], 1) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-sacli-green-600 h-2 rounded-full transition-all duration-300"
                                    style="width: {{ $successMetrics['overall_success_rate'] }}%"></div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 flex items-center gap-1">
                                    <x-icon name="clock" size="xs" class="text-gray-400" />
                                    Avg. Verification Time
                                </span>
                                <span
                                    class="text-lg font-semibold text-blue-600">{{ number_format($successMetrics['avg_verification_time_hours'], 1) }}h</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 flex items-center gap-1">
                                    <x-icon name="calendar" size="xs" class="text-gray-400" />
                                    Avg. Resolution Time
                                </span>
                                <span
                                    class="text-lg font-semibold text-purple-600">{{ number_format($successMetrics['avg_resolution_time_days'], 1) }}d</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance Metrics -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <x-icon name="bolt" size="md" class="text-sacli-green-600" />
                            <h3 class="text-lg font-medium text-gray-900">Performance Metrics</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Verifications Today</span>
                                <span
                                    class="text-lg font-semibold text-sacli-green-600">{{ $performanceMetrics['verifications_today'] }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">This Week</span>
                                <span
                                    class="text-lg font-semibold text-blue-600">{{ $performanceMetrics['verifications_this_week'] }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 flex items-center gap-1">
                                    <x-icon name="users" size="xs" class="text-gray-400" />
                                    Active Users (30d)
                                </span>
                                <span
                                    class="text-lg font-semibold text-purple-600">{{ $performanceMetrics['active_users_30_days'] }}</span>
                            </div>

                            @if ($performanceMetrics['items_needing_attention'] > 0)
                                <div
                                    class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                                    <span class="text-sm text-yellow-700 flex items-center gap-1">
                                        <x-icon name="exclamation-triangle" size="xs" class="text-yellow-600" />
                                        Items Needing Attention
                                    </span>
                                    <span
                                        class="text-lg font-semibold text-yellow-600">{{ $performanceMetrics['items_needing_attention'] }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Comparison Stats -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <x-icon name="arrow-trending-up" size="md" class="text-sacli-green-600" />
                            <h3 class="text-lg font-medium text-gray-900">30-Day Comparison</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Submissions</span>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-lg font-semibold">{{ $comparisonStats['current_period']['submissions'] }}</span>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full flex items-center gap-1 {{ $comparisonStats['percentage_changes']['submissions'] >= 0 ? 'bg-sacli-green-100 text-sacli-green-700' : 'bg-red-100 text-red-700' }}">
                                        <x-icon :name="$comparisonStats['percentage_changes']['submissions'] >= 0
                                            ? 'arrow-up'
                                            : 'arrow-down'" size="xs" />
                                        {{ abs($comparisonStats['percentage_changes']['submissions']) }}%
                                    </span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Verifications</span>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-lg font-semibold">{{ $comparisonStats['current_period']['verifications'] }}</span>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full flex items-center gap-1 {{ $comparisonStats['percentage_changes']['verifications'] >= 0 ? 'bg-sacli-green-100 text-sacli-green-700' : 'bg-red-100 text-red-700' }}">
                                        <x-icon :name="$comparisonStats['percentage_changes']['verifications'] >= 0
                                            ? 'arrow-up'
                                            : 'arrow-down'" size="xs" />
                                        {{ abs($comparisonStats['percentage_changes']['verifications']) }}%
                                    </span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Resolutions</span>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-lg font-semibold">{{ $comparisonStats['current_period']['resolutions'] }}</span>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full flex items-center gap-1 {{ $comparisonStats['percentage_changes']['resolutions'] >= 0 ? 'bg-sacli-green-100 text-sacli-green-700' : 'bg-red-100 text-red-700' }}">
                                        <x-icon :name="$comparisonStats['percentage_changes']['resolutions'] >= 0
                                            ? 'arrow-up'
                                            : 'arrow-down'" size="xs" />
                                        {{ abs($comparisonStats['percentage_changes']['resolutions']) }}%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Statistics and Top Categories -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Monthly Statistics Chart -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <x-icon name="calendar-days" size="md" class="text-sacli-green-600" />
                            <h3 class="text-lg font-medium text-gray-900">Monthly Statistics ({{ date('Y') }})
                            </h3>
                        </div>
                        <div class="h-64 rounded-lg">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Top Categories -->
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <x-icon name="star" size="md" class="text-sacli-green-600" />
                            <h3 class="text-lg font-medium text-gray-900">Top Categories</h3>
                        </div>
                        <div class="space-y-3">
                            @foreach ($topCategories as $index => $category)
                                <div
                                    class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-sacli-green-{{ 400 + $index * 100 }} to-sacli-green-{{ 500 + $index * 100 }} rounded-lg flex items-center justify-center text-white font-semibold text-sm shadow-sm">
                                            {{ $index + 1 }}
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">{{ $category->name }}</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-24 bg-gray-200 rounded-full h-2">
                                            <div class="bg-sacli-green-600 h-2 rounded-full transition-all duration-300"
                                                style="width: {{ $topCategories->max('items_count') > 0 ? ($category->items_count / $topCategories->max('items_count')) * 100 : 0 }}%">
                                            </div>
                                        </div>
                                        <span
                                            class="text-sm font-semibold text-gray-900 w-8 text-right">{{ $category->items_count }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location Statistics (if available) -->
            @if ($locationStats->count() > 0)
                <div
                    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <x-icon name="map-pin" size="md" class="text-sacli-green-600" />
                            <h3 class="text-lg font-medium text-gray-900">Top Locations</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($locationStats->take(6) as $location)
                                <div
                                    class="p-4 border border-gray-200 rounded-xl hover:shadow-md hover:border-sacli-green-300 transition-all duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="text-sm font-medium text-gray-900 truncate flex items-center gap-1">
                                            <x-icon name="map-pin" size="xs" class="text-gray-400" />
                                            {{ $location->location }}
                                        </h4>
                                        <span
                                            class="text-lg font-bold text-sacli-green-600">{{ $location->total_items }}</span>
                                    </div>
                                    <div class="text-xs text-gray-500 space-y-1">
                                        <div class="flex justify-between">
                                            <span>Lost:</span>
                                            <span class="font-medium">{{ $location->lost_items }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Found:</span>
                                            <span class="font-medium">{{ $location->found_items }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Resolved:</span>
                                            <span class="font-medium">{{ $location->resolved_items }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Chart.js configuration with green theme
            Chart.defaults.color = '#374151';
            Chart.defaults.borderColor = '#E5E7EB';

            const greenColors = {
                primary: '#10B981',
                secondary: '#059669',
                light: '#D1FAE5',
                dark: '#047857'
            };

            // Initialize charts
            let submissionTrendsChart, categoryChart, monthlyChart;

            document.addEventListener('DOMContentLoaded', function() {
                initializeCharts();
            });

            function initializeCharts() {
                // Submission Trends Chart
                const submissionCtx = document.getElementById('submissionTrendsChart').getContext('2d');
                const submissionData = @json($submissionTrends);

                submissionTrendsChart = new Chart(submissionCtx, {
                    type: 'line',
                    data: {
                        labels: submissionData.map(item => new Date(item.date).toLocaleDateString()),
                        datasets: [{
                            label: 'Total Submissions',
                            data: submissionData.map(item => item.total_submissions),
                            borderColor: greenColors.primary,
                            backgroundColor: greenColors.light,
                            tension: 0.4,
                            fill: true
                        }, {
                            label: 'Lost Items',
                            data: submissionData.map(item => item.lost_submissions),
                            borderColor: '#EF4444',
                            backgroundColor: 'rgba(239, 68, 68, 0.1)',
                            tension: 0.4
                        }, {
                            label: 'Found Items',
                            data: submissionData.map(item => item.found_submissions),
                            borderColor: '#3B82F6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Category Chart
                const categoryCtx = document.getElementById('categoryChart').getContext('2d');
                const categoryData = @json($categoryStats);

                categoryChart = new Chart(categoryCtx, {
                    type: 'doughnut',
                    data: {
                        labels: categoryData.map(item => item.name),
                        datasets: [{
                            data: categoryData.map(item => item.items_count),
                            backgroundColor: [
                                greenColors.primary,
                                greenColors.secondary,
                                greenColors.dark,
                                '#34D399',
                                '#6EE7B7',
                                '#A7F3D0',
                                '#D1FAE5'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });

                // Monthly Chart
                const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
                const monthlyData = @json($monthlyStats);

                monthlyChart = new Chart(monthlyCtx, {
                    type: 'bar',
                    data: {
                        labels: monthlyData.map(item => `Month ${item.month}`),
                        datasets: [{
                            label: 'Total Items',
                            data: monthlyData.map(item => item.total_items),
                            backgroundColor: greenColors.primary
                        }, {
                            label: 'Verified Items',
                            data: monthlyData.map(item => item.verified_items),
                            backgroundColor: greenColors.secondary
                        }, {
                            label: 'Resolved Items',
                            data: monthlyData.map(item => item.resolved_items),
                            backgroundColor: greenColors.dark
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            function updateTrendChart(days) {
                // Update active button
                document.querySelectorAll('button[onclick^="updateTrendChart"]').forEach(btn => {
                    btn.className =
                        'px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors';
                });
                event.target.className =
                    'px-3 py-1 text-xs bg-sacli-green-100 text-sacli-green-700 rounded-lg hover:bg-sacli-green-200 transition-colors';

                // Fetch new data
                fetch(`/admin/statistics/data?type=submission_trends&days=${days}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            submissionTrendsChart.data.labels = data.data.map(item => new Date(item.date)
                                .toLocaleDateString());
                            submissionTrendsChart.data.datasets[0].data = data.data.map(item => item.total_submissions);
                            submissionTrendsChart.data.datasets[1].data = data.data.map(item => item.lost_submissions);
                            submissionTrendsChart.data.datasets[2].data = data.data.map(item => item.found_submissions);
                            submissionTrendsChart.update();
                        }
                    })
                    .catch(error => console.error('Error updating chart:', error));
            }

            function refreshStatistics() {
                window.location.reload();
            }

            function toggleExportMenu() {
                const menu = document.getElementById('exportMenu');
                menu.classList.toggle('hidden');
            }

            // Close export menu when clicking outside
            document.addEventListener('click', function(event) {
                const menu = document.getElementById('exportMenu');
                const button = event.target.closest('button[onclick="toggleExportMenu()"]');

                if (!button && !menu.contains(event.target)) {
                    menu.classList.add('hidden');
                }
            });

            // Auto-refresh statistics every 5 minutes
            setInterval(function() {
                fetch('/admin/statistics/data?type=overview')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update overview stats without full page reload
                            console.log('Statistics refreshed automatically');
                        }
                    })
                    .catch(error => console.log('Auto-refresh failed:', error));
            }, 300000); // 5 minutes
        </script>
    @endpush
</x-app-layout>
