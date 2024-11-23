@extends('layout.base')

@section('content')
    <x-swiper />

    <div class="container mx-auto py-8 mt-8 xl:max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 space-x-4">
            <x-book-cart />
            <x-book-cart />
            <x-book-cart />
            <x-book-cart />
            <x-book-cart />
            <x-book-cart />
            <x-book-cart />
            <x-book-cart />

        </div>
    </div>
@endsection
