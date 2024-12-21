@extends('layout.base')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="max-w-4xl mx-auto text-2xl md:text-4xl tracking-wide text-center font-bold text-gray-800 py-6">
        Wecima - Books Summaries, Reviews, and Author Insights
    </h1>

    <div class="relative max-w-xl mx-auto mt-6 flex items-center">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 bg-[#00BFB3] rounded-l-full pr-2 cursor-pointer">
            <svg class="w-7 h-7 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="text"
            class="w-full pl-14 pr-4 py-2 border border-gray-300 focus:ring-0 focus:outline-none focus:bg-gray-800 focus:text-white rounded-full"
            placeholder="Book, Author, or Category...">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-12 pb-6">
        @foreach(range(1, 6) as $index)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <a href="{{ route('blogs.show', $index) }}">
                <img class="w-full h-56 object-cover object-center"
                    src="https://wecima.uk/storage/01JFG9FW47KBG6R4DS0XJJTNXW.webp" alt="">
            </a>
            <div class="p-4 space-y-2">
                <p class="text-sm font-semibold text-gray-400"> Dec 19, 2024 </p>
                <a href="{{ route('blogs.show', $index) }}">
                    <h2 class="text-xl font-bold text-gray-800">Penpal by Dathan Auerbach: Novel summary</h2>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
