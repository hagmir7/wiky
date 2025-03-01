@props(['post'])

<div
    class="bg-white shadow-sm rounded-lg overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
    <a href="{{ route('blogs.show', $post->slug) }}" class="block">
        <div class="relative">
            <img class="w-full h-56 object-cover object-center" src="{{ $post->getCoverUrl() }}"
                alt="{{ $post->title }}">
            <div
                class="absolute bottom-0 left-0 bg-gradient-to-r from-blue-500 to-purple-500 text-white text-xs px-3 py-1 m-2 rounded-full">
                {{ $post->category->name ?? 'Uncategorized' }}
            </div>
        </div>
    </a>
    <div class="p-6 space-y-3">
        <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $post->created_at->format('M d, Y') }}
            </p>
            <p class="text-sm font-medium text-gray-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                {{ $post->views ?? 0 }}
            </p>
        </div>
        <a href="{{ route('blogs.show', $post->slug) }}" class="block">
            <h2 class="text-xl font-bold text-gray-800 hover:text-blue-600 transition-colors duration-300">{{
                $post->title }}</h2>
        </a>
        <p class="text-gray-600 line-clamp-2">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}</p>
        {{-- <div class="pt-2 flex items-center">
            <img src="{{ $post->author->avatar ?? asset('images/default-avatar.jpg') }}"
                alt="{{ $post->author->name ?? 'Author' }}" class="h-8 w-8 rounded-full mr-2">
            <span class="text-sm font-medium text-gray-700">{{ $post->author->name ?? 'Author' }}</span>
        </div> --}}
        <a href="{{ route('blogs.show', $post->slug) }}"
            class="inline-block mt-2 text-blue-600 hover:text-blue-800 font-medium text-sm">
            Read more →
        </a>
    </div>
</div>
