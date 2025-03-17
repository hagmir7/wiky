<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WikyBook</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head::styles')
    @stack('head::scripts')
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    @stack('head::end')
</head>
<body class="bg-gray-50">
    <x-nav />

    <main class="mt-16 lg:mt-24">
        @yield('content')
    </main>

    <x-footer />
    @stack('body::scripts')

    @stack('body::end')
</body>
</html>
