<?php

namespace App\Http\Requests\Profile\Pengaturan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNpwpRequest extends FormRequest
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
            'npwp_name'  => 'required',
            'npwp'       => 'required|max_digits:16',
            'npwp_photo' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
