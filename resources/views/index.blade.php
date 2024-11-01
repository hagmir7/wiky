@extends('layout.base')

@section('content')
    <x-swiper />

    <div class="container mx-auto px-4 py-8 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 space-x-4">
            <!-- Book 1 -->
            <x-book-cart />
            <x-book-cart />
            <x-book-cart />
            <x-book-cart />

        </div>
    </div>
@endsection
