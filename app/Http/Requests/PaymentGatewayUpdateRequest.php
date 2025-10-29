<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentGatewayUpdateRequest extends FormRequest
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
            'paystack_status' => 'required|boolean',
            'payment_url' => 'required|string|url',
            'paystack_client_id' => 'required|string|max:500',
            'paystack_secret_key' => 'required|string|max:500',
            'payment_name' => 'required|string',
            // 'paystack_logo' => 'nullable|max:5048'
        ];
    }
}
