@extends('layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">
        ← Back to Products
    </a>
</div>

<div class="bg-white rounded-lg shadow p-8">
    {{-- Product Title --}}
    <h1 class="text-3xl font-bold mb-6">{{ $product->name }}</h1>

    {{-- Data Table --}}
    <table class="w-full mb-8">
        <tbody>
            <tr class="border-b border-gray-200">
                <td class="py-3 px-4 font-semibold bg-gray-50 w-1/4">Category</td>
                <td class="py-3 px-4">{{ $product->category->name }}</td>
            </tr>

            <tr class="border-b border-gray-200">
                <td class="py-3 px-4 font-semibold bg-gray-50 w-1/4">Price</td>
                <td class="py-3 px-4 text-amber-600 font-bold text-lg">{{ number_format($product->price, 2) }} SEK</td>
            </tr>

            <tr class="border-b border-gray-200">
                <td class="py-3 px-4 font-semibold bg-gray-50 w-1/4">Type</td>
                <td class="py-3 px-4">{{ $product->type }}</td>
            </tr>

            <tr class="border-b border-gray-200">
                <td class="py-3 px-4 font-semibold bg-gray-50 w-1/4">Origin</td>
                <td class="py-3 px-4">{{ $product->origin }}</td>
            </tr>

            <tr class="border-b border-gray-200">
                <td class="py-3 px-4 font-semibold bg-gray-50 w-1/4">Weight</td>
                <td class="py-3 px-4">{{ $product->weight_grams }}g</td>
            </tr>

            <tr class="border-b border-gray-200">
                <td class="py-3 px-4 font-semibold bg-gray-50 w-1/4">Stock</td>
                <td class="py-3 px-4">
                    <span @class([
                        'font-bold',
                        'text-green-600' => $product->stock > 0,
                        'text-red-600' => $product->stock === 0,
                    ])>
                        {{ $product->stock }} units
                    </span>
                </td>
            </tr>

            <tr class="border-b border-gray-200">
                <td class="py-3 px-4 font-semibold bg-gray-50 w-1/4">Description</td>
                <td class="py-3 px-4">{{ $product->description }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Action Buttons -->
    <div class="flex gap-3">
        <a href="{{ route('products.edit', $product) }}" 
           class="bg-amber-500 text-white px-6 py-2 rounded font-semibold hover:bg-amber-600">
            Edit Product
        </a>

        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    onclick="return confirm('Are you sure you want to delete this product?')"
                    class="bg-red-500 text-white px-6 py-2 rounded font-semibold hover:bg-red-600">
                Delete Product
            </button>
        </form>

        <a href="{{ route('products.index') }}" 
           class="bg-gray-500 text-white px-6 py-2 rounded font-semibold hover:bg-gray-600">
            Back to List
        </a>
    </div>
</div>
@endsection