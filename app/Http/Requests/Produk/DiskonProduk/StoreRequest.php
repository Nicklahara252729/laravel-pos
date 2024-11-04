<?php

namespace App\Http\Requests\Produk\DiskonProduk;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'discount_name' => [
                'required',
                Rule::unique('discounts')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuid_outlet);
                })
            ],
            'uuid_outlet'           => 'required',
            'amount_status'         => 'required|in:fixed,custom',
            'amount'                => 'required|integer',
            'amount_type_fixed'     => 'nullable|in:rupiah,persen',
            'amount_type_custom'    => 'nullable|in:rupiah,persen',
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'uuid_outlet' => $this->uuidOutlet()
        ]);
    }
}
