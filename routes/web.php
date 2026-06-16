<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

// Login routes (no auth required to access these)
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::delete('/logout', [LoginController::class, 'destroy'])->name('logout');

// Everything below requires login
Route::middleware('auth')->group(function () {

    // Show all products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // Show form to create a new product
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    // Save a new product
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    // Show a single product
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Show form to edit a product
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    // Save edited product
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

    // Delete a product
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
