<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer'
            ],
            'brand_id' => [
                'required',
                'integer',
            ],
            'subcategory' => [
                'required',
                'string',
                'max:255'
            ],
            'name' => [
                'required',
                'string',
                'max:255' // Optionally enforce a max length for the product name
            ],
            'slug' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string'
            ],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'integer'
            ],
            'quantity' => [
                'nullable',
                'integer'
            ],
            'trending' => [
                'nullable',
                'boolean' // Ensure it's a boolean value
            ],
            'status' => [
                'nullable',
                'boolean' // Ensure it's a boolean value
            ],
            'image' => [
                'nullable',
                // 'mimes:png,jpg,jpeg,webp' // Uncomment and specify allowed image types if needed
            ],
            'discount_value' => [
                'nullable',
                'numeric' // Ensure it's a numeric value
            ],
            'discount_type' => [
                'nullable',
                'in:percentage,fixed' // Validate against the allowed values
            ],
        ];
    }
}
