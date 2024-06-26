<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#F5F8FF]">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full font-sans antialiased">
        <div>
            <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
                @include('layouts.navigation')
                @include('layouts.banner')

                <main class="py-10">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <!-- Your content -->
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
