@extends('layout.base')

@section('content')
    <x-swiper />

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Book 1 -->
            <div class="flex bg-white rounded-lg shadow-md relative hover:shadow-xl transition-shadow border duration-300">
                <div class="w-[110px]">
                    <img  src="https://www.z-pdf.com/images/covers/2024/July/6685c3a400cdb/small/9781250010094.jpg" alt="Impossible to Forget" class="h-full object-cover absolute -top-[22px] -left-[35px] w-[135px] rounded-md" />
                </div>
                <div class="w-2/3 md:w-3/4 p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">
                        <a href="#" class="hover:text-blue-600">Impossible to Forget Free PDF Download</a>
                    </h2>
                    <div class="text-sm text-gray-600 mb-2">2022, Imogen Clark</div>
                    <div class="flex mb-2">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <p class="text-gray-700 text-sm">In this poignant novel from million-copy bestselling author Imogen
                        Clark, an...</p>
                </div>
            </div>

            <!-- Book 2 -->
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-1/3 md:w-1/4">
                    <img src="https://www.z-pdf.com/images/covers/2024/July/6685c3a400cdb/small/9781250010094.jpg" alt="A Pair of Jeans and other stories"
                        class="w-full h-full object-cover" />
                </div>
                <div class="w-2/3 md:w-3/4 p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">
                        <a href="#" class="hover:text-blue-600">A Pair of Jeans and other stories Free PDF</a>
                    </h2>
                    <div class="text-sm text-gray-600 mb-2">2013, Qaisra Shahraz</div>
                    <div class="flex mb-2">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <!-- Repeat star SVG 4 more times -->
                    </div>
                    <p class="text-gray-700 text-sm">In this vibrant and moving collection of short stories by award winning
                        author Quaisra...</p>
                </div>
            </div>

            <!-- Book 3 -->
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-1/3 md:w-1/4">
                    <img src="https://www.z-pdf.com/images/covers/2024/July/6685c3a400cdb/small/9781250010094.jpg" alt="Every Fifteen Minutes" class="w-full h-full object-cover" />
                </div>
                <div class="w-2/3 md:w-3/4 p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">
                        <a href="#" class="hover:text-blue-600">Every Fifteen Minutes Free PDF Download</a>
                    </h2>
                    <div class="text-sm text-gray-600 mb-2">2015, Lisa Scottoline</div>
                    <div class="flex mb-2">
                        <!-- Star rating SVGs -->
                    </div>
                    <p class="text-gray-700 text-sm">"Bestseller Scottoline casts an unflinching eye on the damaged world of
                        sociopaths in...</p>
                </div>
            </div>

            <!-- Book 4 -->
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-1/3 md:w-1/4">
                    <img src="https://www.z-pdf.com/images/covers/2024/July/6685c3a400cdb/small/9781250010094.jpg" alt="Most Wanted" class="w-full h-full object-cover" />
                </div>
                <div class="w-2/3 md:w-3/4 p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">
                        <a href="#" class="hover:text-blue-600">Most Wanted Free PDF Download</a>
                    </h2>
                    <div class="text-sm text-gray-600 mb-2">2016, Lisa Scottoline</div>
                    <div class="flex mb-2">
                        <!-- Star rating SVGs -->
                    </div>
                    <p class="text-gray-700 text-sm">"Spellbinding. Another tour de force from Scottoline. It drew me in, in
                        a single...</p>
                </div>
            </div>
        </div>
    </div>
@endsection
