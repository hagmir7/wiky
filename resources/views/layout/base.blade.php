<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head::styles')
    @stack('head::scripts')

    @stack('head::end')
</head>
<body class="bg-gray-50">
    <x-nav />

    <main class="mt-24">
        @yield('content')
    </main>

    <x-footer />
    @stack('body::scripts')

    @stack('body::end')
</body>
</html>
