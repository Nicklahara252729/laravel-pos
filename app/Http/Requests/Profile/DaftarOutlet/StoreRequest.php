<?php

namespace App\Http\Requests\Profile\DaftarOutlet;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'outlet_name'  => 'required|unique:outlets,outlet_name',
            'address'      => 'nullable|string',
            'postal_code'  => 'nullable|string|max:10',
            'phone_number' => ['nullable','regex:/(\+62|62|0)8[1-9][0-9]{6,9}/', 'digits_between:11,13'],
            'logo'         => 'nullable|nullable|mimes:jpeg,png,jpg|max:2048',
            'id_province'  => 'nullable|exists:indonesia_provinces,id',
            'id_city'      => 'nullable|exists:indonesia_cities,id',
            'id_district'  => 'nullable|exists:indonesia_districts,id',
        ];
    }
}
