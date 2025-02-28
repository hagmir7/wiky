<div>
    <!-- Search Input -->
    <div class="relative max-w-xl mx-auto mt-6">
        <div class="relative flex items-center">
            <!-- Search Icon Button -->
            <button class="absolute inset-y-0 left-0 flex items-center justify-center pl-3 pr-2 bg-[#00BFB3] text-white rounded-l-full h-full w-12 z-10">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                          d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </button>

            <!-- Input Field -->
            <input type="text" wire:model.live.debounce.300ms="search"
                   class="w-full pl-14 pr-10 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#00BFB3] focus:border-transparent"
                   placeholder="Book, Author, or Category...">

            <!-- Clear Button (X) -->
            @if($search)
                <button wire:click="clearFilters"
                        class="absolute inset-y-0 right-0 flex items-center justify-center pr-3 text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-12 pb-6">
        @forelse($this->posts as $post)
            <x-post-card :post="$post" />
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">No posts found matching your search criteria.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $this->posts->links('components.pagination-links') }}
    </div>
</div>
