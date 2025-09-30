<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateDetailsRequest extends FormRequest
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
            'name' => "required|string|max:255",
            'email' => "required|email|lowercase|max:255",
            'phone' => "nullable|string|max:25",
            'address' => "nullable|string|max:255",
            'photo' => "nullable|image|max:5000|mimes:png,JPG,jpeg,jpg,gif",
            'status' => "nullable|string",
            'country' => 'nullable|string|max:5048'
        ];
    }
}
