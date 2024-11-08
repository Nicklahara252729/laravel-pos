<?php

namespace App\Http\Requests\Ingredient\DaftarBahan;

use Illuminate\Foundation\Http\FormRequest;

class ImportReplaceRequest extends FormRequest
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
            'file' => 'required|mimes:xlsx,csv|max:2048',
        ];
    }
}
