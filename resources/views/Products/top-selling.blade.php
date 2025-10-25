@extends('layouts.default')

@section('content')
<div class="container mx-auto px-4 py-10">

    <nav class="text-sm text-gray-500 mb-6" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li>
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <span class="mx-2">></span>
            </li>
            <li class="text-black font-semibold">
                Top Selling
            </li>
        </ol>
    </nav>

    <h2 class="text-2xl font-bold mb-6">🔥 Top Selling Products</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="relative">
                <span class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded-full shadow z-10">
                    🔥 Top
                </span>
                @include('categories._product-card', ['product' => $product])
            </div>
        @endforeach
    </div>
</div>
@endsection