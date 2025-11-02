<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicSettingsUpdateRequest extends FormRequest
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
            'site_name' => ['required', 'string', 'max:255'],
            'company_address' => ['required', 'string', 'max:255'],
            'site_email' => ['nullable', 'email', 'max:255'],
            'site_phone' => ['nullable', 'string', 'max:50'],
            'site_whatsapp' => ['required', 'integer', 'max:50'],
            'site_default_currency' => ['required', 'max:5'],
            'site_currency_symbol' => ['required', 'max:5'],
            'site_currency_symbol_position' => ['required', 'max:20'],
            'site_selling_unit' => ['required', 'max:20']
        ];
    }
}
