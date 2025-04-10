<div>
    <!-- Search Input -->
    <div class="relative max-w-xl mx-auto mt-6">
        <div class="relative flex items-center">
            <div
                class="absolute inset-y-0 left-0 flex items-center justify-center pl-3 pr-2 bg-primary-500 text-white rounded-l-full h-full w-12 z-10">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                          d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </div>

            <!-- Input Field -->
            <input type="text" wire:model.live.throttle.500ms="search"
                   class="w-full pl-14 pr-10 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                   placeholder="Book, Author, or Category...">
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-12 pb-6">
        @forelse($this->posts as $post)
            <x-post-card wire:loading.class.delay="opacity-50" :post="$post"/>
        @empty
            <div class="col-span-full text-center py-8">
                <div class="flex flex-col items-center justify-center space-y-6 p-8 text-center">
                    <div class="rounded-full bg-primary-300 p-4 shadow-sm dark:bg-primary-400">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="28"
                            height="28"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="text-white"
                        >
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-lg font-medium">No Results Found</h3>
                        <p class="max-w-sm text-gray-500 dark:text-gray-400">No posts found matching your search
                            criteria. Try adjusting your search terms.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>


    {{-- Load More button --}}
    @if($this->posts->hasMorePages())
        <div class="flex justify-center my-4">
            <nav>
                <ul class="flex py-4">
                    <li>
                        <button wire:click='loadMore'
                                class="px-5 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                wire:loading.attr="disabled">
                            <div class="animate-spin h-4 w-4 mx-auto border-2 border-t-blue-500 rounded-full"
                                 wire:loading>
                            </div>
                            <div wire:loading.remove>{{ __("Load More") }}</div>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
</div>
