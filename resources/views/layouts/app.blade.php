<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/googlemapsAPI/form.js'])
</head>

<body class="font-roboto antialiased">
    @include('layouts.navigation')
    <!-- Page Content -->
    <main class="w-full min-h-[calc(100vh-80px-80px)] bg-[#F9FAFB]">
        {{ $slot }}
    </main>
    <x-footer />
    @stack('scripts')
</body>

</html>