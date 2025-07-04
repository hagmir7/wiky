<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title : __("WikyBook – Your Hub for Book Summaries")  }}</title>
    <meta name="description" content="{{ isset($description) ? $description : __("WikyBook is a platform where you can find summaries of your favorite books. We provide summaries of books in various categories.") }}">
    <meta name="keywords" content="{{ isset($keywords) ? $keywords : __("wikybook, book summaries, book summary, book, summary, summaries") }}">
    <meta name="author" content="{{ isset($author) ? $author : __("WikyBook") }}">
    <meta name="robots" content="{{ isset($robots) ? $robots : "index, follow" }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{ isset($title) ? $title : __("WikyBook") }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="manifest" href="/site.webmanifest" />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <meta name="google-site-verification" content="0j9HFi1WK3cRoDq82BlgbYJSHmX0DgLxqvgD_erZqAo" />
    <meta name="google-adsense-account" content="ca-pub-4988709924825156">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <main>
        {{ $slot }}
    </main>
</div>

@livewireScripts
</body>
</html>
