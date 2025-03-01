@extends('layout.base')

@section('content')
  <section class="max-w-7xl mx-auto pt-12 lg:pt-20 space-y-10">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 space-x-4">
      @foreach ($books as $book)
          <x-book-cart :book="$book"/>
      @endforeach
    </div>

    <div>
        {{ $books->links('components.pagination-links') }}
    </div>
  </section>
@endsection
