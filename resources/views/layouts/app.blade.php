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

            
    <link rel="icon" href="https://priod-production.up.railway.app/build/assets/imgs/LOGO PRIOD.png'" type="image/png">
    <link rel="stylesheet" href="https://priod-production.up.railway.app/build/assets/css/styles.css">
    <link rel="stylesheet" href="https://priod-production.up.railway.app/build/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://priod-production.up.railway.app/build/assets/css/animate.css">
    <link rel="stylesheet" href="https://priod-production.up.railway.app/build/assets/css/bootstrap.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
