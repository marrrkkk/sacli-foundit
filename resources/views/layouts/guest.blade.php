<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Iconify Icons (200k+ icons from all libraries) -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-sacli-green-50 to-sacli-green-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-sacli-green-600" />
            </a>
        </div>

        <main id="main-content" role="main"
            class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-xl border border-sacli-green-200 overflow-hidden sm:rounded-2xl">
            <!-- Flash Messages -->
            @if (session('error'))
                <x-flash-message type="error" class="mb-4">
                    {{ session('error') }}
                </x-flash-message>
            @endif

            @if (session('warning'))
                <x-flash-message type="warning" class="mb-4">
                    {{ session('warning') }}
                </x-flash-message>
            @endif

            @if (session('info'))
                <x-flash-message type="info" class="mb-4">
                    {{ session('info') }}
                </x-flash-message>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>

</html>
