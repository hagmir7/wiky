@extends('layout.base')

@section('content')
  <section class="max-w-7xl mx-auto py-8 mt-8">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
      @foreach ($books as $book)
          <x-book-new-cart :book="$book"/>
      @endforeach
    </div>
    <div class="pt-12">
    {{ $books->links('components.pagination-links') }}
    </div>
  </section>
@endsection
