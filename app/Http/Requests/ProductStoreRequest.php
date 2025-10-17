<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required', 'max:5048'],
            'image2' => ['nullable', 'max:5048'],
            'image3' => ['nullable', 'max:5048'],
            'image4' => ['nullable', 'max:5048'],
            "name" => ['required', 'max:255'],
            "size" => ['required', 'integer'],
            "texture" => ['required', 'string', 'max:255'],
            "color_family" => ['nullable', 'string'],
            "brand" => ['required', 'integer'],
            "quantity" => ['required', 'numeric'],
            "short_description" => ['required', 'max:500'],
            "long_description" => ['nullable'],
            "price" => ['required', 'numeric'],
            // "offer_price" => ['nullable', 'numeric'],
            "seo_title" => ['nullable', 'max:255'],
            "seo_description" => ['nullable', 'max:255'],
            "status" => ['required', 'boolean', 'in:1,0']
        ];
    }
}
