@extends('layout.base')

@section('content')
    <x-swiper />

    <div class="container max-w-7xl mx-auto pt-12 lg:pt-20">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 space-x-4">

            @forelse($books as $book)
                <x-book-cart :book="$book" wire:key="{{ $book->id }}"/>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center px-4">
                    <div class="w-full max-w-sm text-center">
                        <svg class="mx-auto h-40 w-40 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>

                        <div class="space-y-2">
                            <h3 class="text-xl font-medium text-gray-900">
                                Coming Soon!
                            </h3>

                            <p class="text-base text-gray-500">
                                We are working on adding more books to our collection. Please check back later.
                            </p>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
@endsection
