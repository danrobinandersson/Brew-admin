
@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Products</h1>

@if($products->count() > 0)
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <!-- Table Header -->
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold">Name</th>
                    <th class="py-3 px-4 text-left font-semibold">Category</th>
                    <th class="py-3 px-4 text-left font-semibold">Price</th>
                    <th class="py-3 px-4 text-left font-semibold">Type</th>
                    <th class="py-3 px-4 text-left font-semibold">Stock</th>
                    <th class="py-3 px-4 text-left font-semibold">Actions</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach($products as $product)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-4 font-semibold">{{ $product->name }}</td>
                        <td class="py-3 px-4">{{ $product->category->name }}</td>
                        <td class="py-3 px-4 text-amber-600 font-bold">{{ number_format($product->price, 2) }} SEK</td>
                        <td class="py-3 px-4">{{ $product->type }}</td>
                        <td class="py-3 px-4">
                            <span @class([
                                'font-bold',
                                'text-green-600' => $product->stock > 0,
                                'text-red-600' => $product->stock === 0,
                            ])>
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <a href="{{ route('products.show', $product) }}" 
                                   class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                                    View
                                </a>
                                
                                <a href="{{ route('products.edit', $product) }}" 
                                   class="bg-amber-500 text-white px-3 py-1 rounded text-sm hover:bg-amber-600">
                                    Edit
                                </a>
                                
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure?')"
                                            class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="bg-amber-50 border border-amber-200 rounded-lg p-6 text-center">
        <p class="text-gray-700 text-lg">📦 No products found.</p>
    </div>
@endif
@endsection