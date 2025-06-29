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
    <link rel="stylesheet" href="https://priod-production.up.railway.app/build/app-DEZZvcA.css">
    <script src="https://cdn.tailwindcss.com"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="{{route('inicio')}}" >
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
