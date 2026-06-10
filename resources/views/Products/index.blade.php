@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Products</h1>

@if($products->count() > 0)
@foreach($products as $product)
<div class="mb-4 p-4 border border-gray-300 rounded">
    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
    <p>Price: {{ $product->price }} SEK</p>
</div>
@endforeach
@else
<p class="text-gray-500">No products found. Create one first!</p>
@endif
@endsection