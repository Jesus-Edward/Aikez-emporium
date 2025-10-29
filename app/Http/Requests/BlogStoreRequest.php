<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'category' => 'required|integer',
            'status' => 'required|boolean',
            'image' => 'required|max:5048|mimes:png,jpeg,jpg,gif,heic,webp',
            'title' => 'required|string|max:255|unique:blog_posts,title',
            'short_post' => 'required|string|max:500',
            'post' => 'nullable'
        ];
    }
}
