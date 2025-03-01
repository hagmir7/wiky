@extends('layout.base')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="max-w-4xl mx-auto text-xl md:text-2xl tracking-wide text-center font-bold text-gray-800 py-6">
        {{ __("WikyBook") }} – {{ __("Your Hub for Book Summaries and Reviews") }}
    </h1>
    <livewire:post-filter />
</section>
@endsection
