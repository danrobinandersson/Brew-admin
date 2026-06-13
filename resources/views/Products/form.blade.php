@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-6">
        <p class="font-semibold mb-2">Please fix the following errors:</p>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST" class="bg-white rounded-lg shadow p-8">
    @csrf
    @if($product->exists)
        @method('PUT')
    @endif

    {{-- Name Field --}}
    <div class="mb-6">
        <label for="name" class="block text-sm font-semibold mb-2">Product Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded @error('name') border-red-500 @enderror"
               required>
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Category Field --}}
    <div class="mb-6">
        <label for="category_id" class="block text-sm font-semibold mb-2">Category</label>
        <select id="category_id" name="category_id"
                class="w-full px-4 py-2 border border-gray-300 rounded @error('category_id') border-red-500 @enderror"
                required>
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @if(old('category_id', $product->category_id) == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Price Field --}}
    <div class="mb-6">
        <label for="price" class="block text-sm font-semibold mb-2">Price (SEK)</label>
        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
               step="0.01" min="0"
               class="w-full px-4 py-2 border border-gray-300 rounded @error('price') border-red-500 @enderror"
               required>
        @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Type Field --}}
    <div class="mb-6">
        <label for="type" class="block text-sm font-semibold mb-2">Type</label>
        <input type="text" id="type" name="type" value="{{ old('type', $product->type) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded @error('type') border-red-500 @enderror"
               required>
        @error('type')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Origin Field --}}
    <div class="mb-6">
        <label for="origin" class="block text-sm font-semibold mb-2">Origin</label>
        <input type="text" id="origin" name="origin" value="{{ old('origin', $product->origin) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded @error('origin') border-red-500 @enderror"
               required>
        @error('origin')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Weight Field --}}
    <div class="mb-6">
        <label for="weight_grams" class="block text-sm font-semibold mb-2">Weight (grams)</label>
        <input type="number" id="weight_grams" name="weight_grams" value="{{ old('weight_grams', $product->weight_grams) }}"
               min="0"
               class="w-full px-4 py-2 border border-gray-300 rounded @error('weight_grams') border-red-500 @enderror"
               required>
        @error('weight_grams')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Stock Field --}}
    <div class="mb-6">
        <label for="stock" class="block text-sm font-semibold mb-2">Stock (units)</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
               min="0"
               class="w-full px-4 py-2 border border-gray-300 rounded @error('stock') border-red-500 @enderror"
               required>
        @error('stock')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description Field --}}
    <div class="mb-6">
        <label for="description" class="block text-sm font-semibold mb-2">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="w-full px-4 py-2 border border-gray-300 rounded @error('description') border-red-500 @enderror"
                  required>{{ old('description', $product->description) }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Buttons --}}
    <div class="flex gap-3">
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded font-semibold hover:bg-green-600">
            Save Product
        </button>
        <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded font-semibold hover:bg-gray-600">
            Cancel
        </a>
    </div>
</form>