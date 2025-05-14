<x-layouts.base>
    <x-slot name="title">
        {{ $page->title }} – {{ config('app.name') }}
    </x-slot>

    <x-slot name="description">
        {{ __("Wikybook is dedicated to providing book summaries, author profiles, quotes, and book reviews.") }}
    </x-slot>

    <x-slot name="keywords">
        {{ __("wikybook, book summaries, book summary, book, summary, summaries") }}
    </x-slot>

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
        <div class="max-w-4xl mx-auto mb-6">
            <article class="bg-white rounded-lg shadow-md overflow-hidden py-5 px-6 md:px-8 lg:px-10 mb-4">
                {{-- Title and Date --}}
                <div class="animate-fade-in" style="animation-delay: 0.1s">
                    <h1 class="text-xl md:text-2xl pt-4 lg:text-3xl tracking-tight font-extrabold text-gray-900 leading-tight mb-4">
                        {{ $page->title }}
                    </h1>
                </div>

                {{-- Content with Tailwind Typography (prose) --}}
                <div class="post-text prose mb-6 prose-lg max-w-none prose-gray lg:prose-xl prose-img:rounded-xl prose-img:my-8 prose-headings:font-bold prose-headings:tracking-tight prose-h2:text-3xl prose-h2:text-gray-800 prose-h2:mt-12 prose-h2:mb-4 prose-h3:text-2xl prose-h3:text-gray-700 prose-h3:mt-8 prose-h3:mb-3 prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-6 prose-a:text-blue-600 prose-a:font-medium prose-a:no-underline hover:prose-a:text-blue-800 hover:prose-a:underline prose-blockquote:border-l-4 prose-blockquote:border-blue-500 prose-blockquote:pl-6 prose-blockquote:py-1 prose-blockquote:italic prose-blockquote:text-gray-700 prose-code:text-pink-600 prose-code:bg-gray-100 prose-code:rounded prose-code:px-1 prose-pre:bg-gray-900 prose-pre:text-gray-100 prose-pre:p-6 prose-pre:rounded-xl prose-pre:font-mono prose-pre:text-sm prose-ol:text-gray-600 prose-ul:text-gray-600 prose-li:mb-2 prose-li:marker:text-blue-500 animate-fade-in"
                    style="animation-delay: 0.3s">
                    {!! $page->content !!}
                </div>
            </article>
        </div>
    </div>
</section>
</x-layouts.base>
