<x-layouts.base>
    <x-slot name="title">
        {{ __("WikyBook") }} – {{ __("Your Hub for Book Summaries and Reviews") }}
    </x-slot>
    <x-slot name="description">
        {{ __("Connecting book lovers, authors, and readers in a vibrant digital library ecosystem.") }}
    </x-slot>
    <x-slot name="keywords">
        {{ __("wikybook, book summaries, book summary, book, summary, summaries") }}
    </x-slot>

<section class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="max-w-4xl mx-auto text-xl md:text-2xl tracking-wide text-center font-bold text-gray-800 py-4">
        {{ __("WikyBook") }} – {{ __("Your Hub for Book Summaries and Reviews") }}
    </h1>
    <livewire:post-filter />
</section>
</x-layouts.base>
