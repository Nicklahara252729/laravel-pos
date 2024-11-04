<?php

namespace App\Http\Requests\Produk\TipePenjualan;

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
            'uuid_outlet'       => 'required',
            'uuid_gratuity'     => 'required|exists:gratuities,uuid_gratuity',
            'sales_type_name'   => [
                'required',
                Rule::unique('sales_types')->where(function ($query) {
                    return $query->where([
                        'uuid_outlet' => $this->uuid_outlet,
                        'uuid_gratuity' => $this->uuid_gratuity
                    ]);
                })
            ],
            'sales_status'      => 'required|in:active,deactive'
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
