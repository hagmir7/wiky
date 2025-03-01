<div class="space-y-12">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 lg:gap-16">
        @foreach ($this->books as $book)
            <x-book-cart :book="$book"/>
        @endforeach
    </div>

    <div>
        {{ $this->books->links('components.pagination-links') }}
    </div>
</div>
