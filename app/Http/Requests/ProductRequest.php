<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'weight_grams' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',
            'name.required' => 'Product name is required.',
            'price.numeric' => 'Price must be a number.',
            'weight_grams.integer' => 'Weight must be a whole number in grams.',
            'stock.integer' => 'Stock must be a whole number.',
        ];
    }
}
