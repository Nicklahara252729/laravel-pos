<?php

namespace App\Http\Requests\Profile\Pengaturan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInfoBisnisRequest extends FormRequest
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
            'business_name'     => 'required',
            'business_address'  => 'required',
            'postal_code'       => 'required',
            'nik_name'          => 'required',
            'nik'               => 'required|max_digits:16',
            'id_province'       => 'nullable|exists:indonesia_provinces,id',
            'id_city'           => 'nullable|exists:indonesia_cities,id',
            'id_district'       => 'nullable|exists:indonesia_districts,id',
        ];
    }
}
