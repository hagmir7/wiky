@props(['post'])

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <a href="{{ route('blogs.show', $post->slug) }}">
        <img class="w-full h-56 object-cover object-center"
            src="{{ $post->getCoverUrl() }}" alt="{{ $post->title }}">
    </a>
    <div class="p-4 space-y-2">
        <p class="text-sm font-semibold text-gray-400">{{ $post->created_at->format('M d, Y') }}</p>
        <a href="{{ route('blogs.show', $post->slug) }}">
            <h2 class="text-xl font-bold text-gray-800">{{ $post->title }}</h2>
        </a>
    </div>
</div>
