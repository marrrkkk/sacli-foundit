<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Server Error - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-sacli-green-50">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full">
            <div class="bg-white rounded-2xl shadow-xl p-8 sm:p-12 text-center">
                <!-- Icon -->
                <div class="w-24 h-24 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <x-icon name="exclamation-circle" size="xl" class="text-red-600 w-12 h-12" />
                </div>

                <!-- Error Code -->
                <h1 class="text-6xl sm:text-7xl font-bold text-gray-900 mb-4">500</h1>

                <!-- Error Message -->
                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-4">
                    Server Error
                </h2>

                <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">
                    Oops! Something went wrong on our end. We're working to fix the issue. Please try again later.
                </p>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-sacli-green-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-sacli-green-700 focus:bg-sacli-green-700 active:bg-sacli-green-800 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-sm hover:shadow-md">
                        <x-icon name="home" size="sm" />
                        Go to Homepage
                    </a>

                    <button onclick="window.location.reload()"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border-2 border-sacli-green-600 rounded-lg font-semibold text-sm text-sacli-green-600 hover:bg-sacli-green-50 focus:bg-sacli-green-50 active:bg-sacli-green-100 focus:outline-none focus:ring-2 focus:ring-sacli-green-500 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                        <x-icon name="arrow-path" size="sm" />
                        Try Again
                    </button>
                </div>

                <!-- Additional Help -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <p class="text-sm text-gray-500">
                        If the problem persists, please contact support.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
