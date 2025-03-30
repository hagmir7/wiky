<x-layouts.base>

@section('styles')
<!-- Optional: Add custom styles for this page -->
<style>
    /* Reading progress bar */
    .progress-container {
        width: 100%;
        height: 4px;
        background: transparent;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 50;
    }



    .progress-bar {
        height: 4px;
        background: linear-gradient(to right, #3b82f6, #8b5cf6);
        width: 0%;
    }

    /* Table of contents highlight */
    .toc-link.active {
        color: #3b82f6;
        font-weight: 600;
        border-left-color: #3b82f6;
    }

    /* Custom blockquote style */
    .custom-blockquote {
        position: relative;
    }

    .custom-blockquote::before {
        content: '"';
        font-size: 4rem;
        position: absolute;
        left: -1rem;
        top: -1.5rem;
        color: #e5e7eb;
        font-family: Georgia, serif;
    }

    /* Image zoom effect */
    .zoom-img {
        transition: transform 0.3s ease;
    }

    .zoom-img:hover {
        transform: scale(1.02);
    }

    /* Custom animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease forwards;
    }
</style>
@endsection

@section('content')
<!-- Reading Progress Bar -->
<div class="progress-container">
    <div class="progress-bar" id="readingProgress"></div>
</div>

<section class="w-full px-4 py-8">
    <div class="relative">
        <div class="max-w-4xl mx-auto">
            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <img src="{{ $post->getMedia('posts-cover')->first()?->getUrl() }}" alt="{{ $post->title }}" class="w-full zoom-img" />
                    @if(isset($post->category))
                    <span class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-md">
                        {{ $post->category->name }}
                    </span>
                    @endif
                </div>

                <div class="p-3 md:p-6">
                    <!-- Title and Meta -->
                    <div class="animate-fade-in" style="animation-delay: 0.1s">
                        <h1 class="text-xl md:text-2xl lg:text-3xl tracking-tight font-extrabold text-gray-900 leading-tight mb-4">
                            {{ $post->title }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-4 text-gray-500 mb-8">
                            <!-- Author Info -->
                            <div class="flex items-center gap-2">
                                @if(isset($post->author) && isset($post->author->avatar))
                                <img src="{{ $post->author->avatar }}" alt="{{ $post->author->name }}"
                                    class="w-10 h-10 rounded-full border-2 border-white shadow">
                                @else
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                @endif
                                <span class="font-medium text-gray-700">
                                    {{ $post->user->first_name . " " . $post->user->last_name ?? 'Admin' }}
                                </span>
                            </div>

                            <!-- Separator Dot -->
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>

                            <!-- Date with Icon -->
                            <div class="flex items-center gap-1">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                    {{ $post->created_at->format('M d, Y') }}
                                </time>
                            </div>

                            <!-- Separator Dot -->
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>

                            <!-- Reading Time -->
                            <div class="flex items-center gap-1">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>{{ $post->reading_time ?? '5 min' }} read</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="animate-fade-in text-xl leading-relaxed text-gray-600 mb-8"
                        style="animation-delay: 0.2s">
                        {!! $post->description !!}
                    </div>

                   <!-- Social Sharing Buttons - Now Floating -->
                <div class="hidden lg:flex flex-col fixed left-4 top-1/3 space-y-3 z-10 animate-fade-in" style="animation-delay: 0.5s">
                    @php
                    $shareUrl = urlencode(url()->current());
                    $postTitle = urlencode($post->title);
                    @endphp

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}&quote={{ $postTitle }}" target="_blank"
                        class="bg-white text-blue-600 hover:bg-blue-600 hover:text-white p-3 rounded-full shadow-sm md:shadow-lg transition duration-300"
                        aria-label="Share on Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                            </path>
                        </svg>
                    </a>

                    <!-- Twitter/X -->
                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $postTitle }}" target="_blank"
                        class="bg-white text-black hover:bg-black hover:text-white p-3 rounded-full shadow-sm md:shadow-lg transition duration-300"
                        aria-label="Share on Twitter/X">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Z">
                            </path>
                        </svg>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://api.whatsapp.com/send?text={{ $postTitle }}%20{{ $shareUrl }}" target="_blank"
                        class="bg-white text-green-500 hover:bg-green-500 hover:text-white p-3 rounded-full shadow-sm md:shadow-lg transition duration-300"
                        aria-label="Share on WhatsApp">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347">
                            </path>
                        </svg>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank"
                        class="bg-white text-blue-400 hover:bg-blue-400 hover:text-white p-3 rounded-full shadow-sm md:shadow-lg transition duration-300"
                        aria-label="Share on LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z">
                            </path>
                        </svg>
                    </a>

                    <!-- Copy Link Button -->
                    <button onclick="copyToClipboard('{{ url()->current() }}')" id="copyLinkBtn"
                        class="bg-white text-gray-800 hover:bg-gray-800 hover:text-white p-3 rounded-full shadow-sm md:shadow-lg transition duration-300"
                        aria-label="Copy Link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                            </path>
                        </svg>
                    </button>
                </div>

                <script>
                    function copyToClipboard(link) {
                        navigator.clipboard.writeText(link).then(() => {

                        }).catch(err => {
                            console.error('Failed to copy: ', err);
                        });
                    }
                </script>

                    @if($post->tags)
                    <div class="flex flex-wrap gap-2 mb-8">
                        @foreach(explode(',', $post->tags) as $tag)
                        <a
                            class="inline-block px-3 py-1 text-sm text-blue-600 bg-blue-50 rounded-full hover:bg-blue-100 transition">
                            #{{ trim($tag) }}
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- Content with Tailwind Typography (prose) --}}
                    <div class="post-text prose prose-lg max-w-none prose-gray lg:prose-xl prose-img:rounded-xl prose-img:shadow-sm md:shadow-lg prose-img:my-8 prose-headings:font-bold prose-headings:tracking-tight prose-h2:text-3xl prose-h2:text-gray-800 prose-h2:mt-12 prose-h2:mb-4 prose-h3:text-2xl prose-h3:text-gray-700 prose-h3:mt-8 prose-h3:mb-3 prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-6 prose-a:text-blue-600 prose-a:font-medium prose-a:no-underline hover:prose-a:text-blue-800 hover:prose-a:underline prose-blockquote:border-l-4 prose-blockquote:border-blue-500 prose-blockquote:pl-6 prose-blockquote:py-1 prose-blockquote:italic prose-blockquote:text-gray-700 prose-code:text-pink-600 prose-code:bg-gray-100 prose-code:rounded prose-code:px-1 prose-pre:bg-gray-900 prose-pre:text-gray-100 prose-pre:p-6 prose-pre:rounded-xl prose-pre:shadow-md prose-pre:font-mono prose-pre:text-sm prose-ol:text-gray-600 prose-ul:text-gray-600 prose-li:mb-2 prose-li:marker:text-blue-500 animate-fade-in" style="animation-delay: 0.3s">
                        {!! $post->content !!}
                    </div>



                    {{-- @livewire('post-comments', ['post' => $post], key($post->id)) --}}
                </div>
            </article>
            {{-- Related Posts --}}
            <div class="mt-12 animate-fade-in" style="animation-delay: 0.5s">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">You might also like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($posts ?? [] as $post)
                    <a href="{{ route('blogs.show', $post) }}" class="group">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-sm md:shadow-lg transition duration-300">
                            <img src="{{ optional($post->getMedia('posts-cover')->first())?->getUrl() ?? asset('default-image.jpg') }}"
                                alt="{{ $post->title }}"
                                class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            <div class="p-2 mt-0 pt-0">
                                <h3 class="font-semibold text-gray-800 text-lg group-hover:text-blue-600 transition mb-2">
                                    {{ \Illuminate\Support\Str::limit($post->title, 60) }}
                                </h3>
                                <p class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
</x-layouts.base>
