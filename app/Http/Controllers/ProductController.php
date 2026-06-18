<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::with('category');

        // Filter by category if selected
        if (request('category_id')) {
            $query->where('category_id', request('category_id'));
        }

        // Filter by type if selected
        if (request('type')) {
            $query->where('type', request('type'));
        }

        // Filter by price range if selected
        if (request('price_min')) {
            $query->where('price', '>=', request('price_min'));
        }

        if (request('price_max')) {
            $query->where('price', '<=', request('price_max'));
        }

        $products = $query->get();
        $categories = Category::all();

        // Get all unique types from products
        $types = Product::distinct()->pluck('type')->sort();

        return view('products.index', compact('products', 'categories', 'types'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.show', $product)
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
