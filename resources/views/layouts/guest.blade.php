<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite(['resources/css/scroll-to-top.css', 'resources/js/scroll-to-top.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="div-exclude font-sans bg-gray-100 text-gray-900 antialiased">
            {{ $slot }}
            <x-footer />
            <x-button-scroll-to-top />
        </div>

        @livewireScripts
    </body>
</html>
