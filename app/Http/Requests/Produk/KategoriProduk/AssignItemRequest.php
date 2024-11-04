<?php

namespace App\Http\Requests\Produk\KategoriProduk;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssignItemRequest extends FormRequest
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
            'uuid_item.*' => [
                'required',
                Rule::exists('items')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                })
            ]
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }
}
