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
    @livewireStyles
</head>
<body class="bg-gray-50">
    <x-nav />
    @yield('content')
    <x-footer />
    @vite('resources/js/app.js')
    @stack('body::scripts')

    @livewireScriptConfig
    @stack('body::end')
</body>
</html>
