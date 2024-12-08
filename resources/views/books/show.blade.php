@props(['book'])
@extends('layout.base')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-xl shadow-xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-8">
            <div class="lg:col-span-1">
                <div class="sticky top-8">
                    <div class="aspect-[3/4] relative group/image">
                        <img 
                            src="https://facepy.com/media/books/PNG/2024-11-01/b2eefc450c6343d78c3d33879b6eb475.png"
                            alt="Impossible to Forget"
                            class="w-full h-full object-cover rounded-lg shadow-lg cursor-pointer transition-transform duration-300 ease-in-out"
                        />
                        
                        {{-- <div class="fixed inset-0 bg-black bg-opacity-0 pointer-events-none opacity-0 group-hover/image:opacity-100 group-hover/image:bg-opacity-75 group-hover/image:pointer-events-auto transition-all duration-300 z-50">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img 
                                    src="https://facepy.com/media/books/PNG/2024-11-01/b2eefc450c6343d78c3d33879b6eb475.png"
                                    alt="Impossible to Forget"
                                    class="max-w-[90vw] max-h-[90vh] object-contain transform scale-90 group-hover/image:scale-100 transition-all duration-300"
                                />
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{$book?->name}}</h1>
                        <p class="mt-2 text-xl text-gray-600">by {{$book->author?->full_name}}</p>
                    </div>
                    <button class="text-gray-400 hover:text-red-500 transition-colors duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </button>
                </div>

                {{-- Badges Section --}}
                <div class="mt-6 flex items-center space-x-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        4.8 (2,345 reviews)
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        Bestseller
                    </span>
                </div>

                {{-- Price Section --}}
                <div class="mt-8">
                    <div class="flex items-baseline space-x-4">
                        <span class="text-4xl font-bold text-gray-900">Free</span>
                        <span class="text-xl text-gray-500 line-through">$12.99</span>
                    </div>
                </div>

                {{-- Description --}}
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-900">About the Book</h2>
                    <p class="mt-4 text-gray-600 leading-relaxed">{{$book?->description}}</p>
                </div>

                {{-- Genre Tags --}}
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Genres</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($book->tags as $tag)
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1.5 rounded-full">{{$tag}}</span>
                        @endforeach
                        {{-- <span class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1.5 rounded-full">Drama</span>
                        <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1.5 rounded-full">Family</span> --}}
                    </div>
                </div>

                {{-- Book Details --}}
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Book Details</h2>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Publication Date</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$book->published_date->diffForHumans()}}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Language</dt>
                            <dd class="mt-1 text-sm text-gray-900">English</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Pages</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$book?->pages}}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">ISBN</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$book?->isbn}}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <button class="flex-1 bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">
                        Read Now
                    </button>
                    <button class="flex-1 bg-gray-100 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors duration-300">
                        Download PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection