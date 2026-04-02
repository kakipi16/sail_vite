<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>

<body class="font-roboto antialiased">
    <?php include_once 'images/symbol-defs.svg'; ?>
    @include('layouts.navigation')
    <!-- Page Content -->
    <main class="w-full min-h-[calc(100vh-80px-80px)] bg-[#F9FAFB]">
        {{ $slot }}
    </main>
    <x-footer />
    @stack('scripts')
</body>

</html>