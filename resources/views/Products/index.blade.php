@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Products</h1>

{{-- Filter Form --}}
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <form method="GET" action="{{ route('products.index') }}" class="flex gap-4 items-end flex-wrap">
        <div>
            <label for="category_id" class="block text-sm font-semibold mb-2">Filter by Category</label>
            <select id="category_id" name="category_id" class="px-4 py-2 border border-gray-300 rounded">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if(request('category_id') == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="type" class="block text-sm font-semibold mb-2">Filter by Type</label>
            <select id="type" name="type" class="px-4 py-2 border border-gray-300 rounded">
                <option value="">All Types</option>
                @foreach($types as $type)
                    <option value="{{ $type }}"
                        @if(request('type') == $type) selected @endif>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="price_min" class="block text-sm font-semibold mb-2">Min Price (SEK)</label>
            <input type="number" id="price_min" name="price_min" min="0" step="0.1"
                   value="{{ request('price_min') }}"
                   class="px-4 py-2 border border-gray-300 rounded"
                   placeholder="0">
        </div>

        <div>
            <label for="price_max" class="block text-sm font-semibold mb-2">Max Price (SEK)</label>
            <input type="number" id="price_max" name="price_max" min="0" step="0.1"
                   value="{{ request('price_max') }}"
                   class="px-4 py-2 border border-gray-300 rounded"
                   placeholder="999">
        </div>

        <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded font-semibold hover:bg-amber-700">
            Filter
        </button>

        @if(request('category_id') || request('type') || request('price_min') || request('price_max'))
            <a href="{{ route('products.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded font-semibold hover:bg-gray-500">
                Clear Filters
            </a>
        @endif
    </form>
</div>

{{-- Products Table --}}
@if($products->count() > 0)
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
             {{-- Table Header  --}}
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

            {{-- Table Body --}}
            <tbody>
                @foreach($products as $product)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-4 font-semibold">{{ $product->name }}</td>
                        <td class="py-3 px-4">{{ $product->category->name }}</td>
                        <td class="py-3 px-4 font-bold">{{ number_format($product->price, 2) }} SEK</td>
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
        @if(request('category_id'))
            <a href="{{ route('products.index') }}" class="text-amber-600 font-semibold hover:underline mt-2 inline-block">
                Clear filter to see all products
            </a>
        @endif
    </div>
@endif
@endsection