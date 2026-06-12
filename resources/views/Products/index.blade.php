@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Products</h1>

    @if($products->count() > 0)
        @foreach($products as $product)
            <div class="mb-4 p-4 border border-gray-300 rounded">
                <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                <p>Price: {{ $product->price }} SEK</p>
                
                <!-- Action Links -->
                <div class="mt-4 flex gap-2">
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
            </div>
        @endforeach
    @else
        <p class="text-gray-500">No products found. Create one first!</p>
    @endif
@endsection
