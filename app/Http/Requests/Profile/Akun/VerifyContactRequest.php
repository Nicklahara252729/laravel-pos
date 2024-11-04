<?php

namespace App\Http\Requests\Profile\Akun;

use Illuminate\Foundation\Http\FormRequest;

class VerifyContactRequest extends FormRequest
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
            'kode.*' => 'required|max_digits:6',
        ];
    }
}
