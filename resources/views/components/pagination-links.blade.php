@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center w-full">
        <div class="w-full pt-4">
            <ul class="flex flex-wrap items-center justify-center gap-1 lg:space-y-0">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span class="block p-2.5 sm:px-3 sm:py-2 leading-tight text-gray-500 bg-white border border-gray-200 rounded-l-lg cursor-not-allowed">
                            <svg aria-hidden="true" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </span>
                    </li>
                @else
                    <li>
                        <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="block p-2.5 sm:px-3 sm:py-2 leading-tight text-gray-500 bg-white border border-gray-200 rounded-l-lg lg:hover:bg-gray-100">
                            <svg aria-hidden="true" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li>
                            <span class="p-2 sm:px-3 sm:py-2 leading-tight text-gray-500 bg-white border border-gray-200">{{ $element }}</span>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li>
                                <button wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled" class="{{ $page == $paginator->currentPage() ? 'z-10 p-2 sm:px-3 sm:py-2 leading-tight text-white border border-primary-400 bg-primary-400' : 'p-2 sm:px-3 sm:py-2 leading-tight text-gray-500 bg-white border border-gray-200 lg:hover:bg-gray-100' }}">
                                    {{ $page }}
                                </button>
                            </li>
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="block p-2.5 sm:px-3 sm:py-2 leading-tight text-gray-500 bg-white border border-gray-200 rounded-r-lg lg:hover:bg-gray-100">
                            <svg aria-hidden="true" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </button>
                    </li>
                @else
                    <li>
                        <span class="block p-2.5 sm:px-3 sm:py-2 leading-tight text-gray-500 bg-white border border-gray-200 rounded-r-lg cursor-not-allowed">
                            <svg aria-hidden="true" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
