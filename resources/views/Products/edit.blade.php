@extends('layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">
        ← Back to Products
    </a>
</div>

<h1 class="text-3xl font-bold mb-6">Edit Product</h1>

@include('products.form', [
    'product' => $product,
    'categories' => $categories,
    'action' => route('products.update', $product)
])
@endsection