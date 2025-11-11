<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailSettingsUpdateRequest extends FormRequest
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
            'mail_mailer' => ['required', 'string', 'max:255'],
            'resend_api_key' => ['required', 'string', 'max:255'],
            'mail_from_address' => ['required', 'email', 'max:255'],
            // 'mail_port' => ['required', 'integer'],
            // 'mail_encryption' => ['required', 'string', 'max:20'],
            // 'mail_host' => ['required', 'string', 'max:50'],
            // 'mail_username' => ['required', 'max:255'],
            // 'mail_password' => ['required', 'max:255'],
            // 'received_mail_address' => ['required', 'email', 'max:255'],
        ];
    }
}
