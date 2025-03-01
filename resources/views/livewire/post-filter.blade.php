<div>
    <!-- Search Input -->
    <div class="relative max-w-xl mx-auto mt-6 flex items-center">
        <div wire:click="clearFilters"
             class="absolute inset-y-0 left-0 flex items-center pl-3 bg-[#00BFB3] rounded-l-full pr-2 cursor-pointer">
            <svg class="w-7 h-7 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                      d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="text" wire:model.live.debounce.300ms="search"
               class="w-full pl-14 pr-4 py-2 border border-gray-300 focus:ring-0 focus:outline-none focus:bg-gray-800 focus:text-white rounded-full"
               placeholder="Book, Author, or Category...">
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-12 pb-6">
        @forelse($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">No posts found matching your search criteria.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $posts->links('components.pagination-links') }}
    </div>
</div>
