<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => [
                'required','string'
            ],

            'name' => [
                'required','string'
            ],
            'slug' => [
                'required','string', 'max:255'
            ],
            'brand' => [
                'required','string', 'max:255'
            ],
            'small_description' => [
                'required','string'
            ],
            'description' => [
                'required','string'
            ],
            'original_price' => [
                'required','integer'
            ],
            'selling_price' => [
                'required', 'integer'
            ],
            'quantity' => [
                'required','integer'
            ],
            'trending' => [
                'required'
            ],
            'status' => [
                'required'
            ],
            'meta_title' => [
                'nullable', 'string'
            ],
            'meta_keyword' => [
                'nullable','string'
            ],
            'meta_description' => [
                'nullable','string'
            ],
            
            'image' => [
                'nullable'
                // 'image|mimes:png,jpg,jpeg'
            ]
            

        ];
    }
}
