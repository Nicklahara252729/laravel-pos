<?php

namespace App\Http\Requests\RiwayatTransaksi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResendReceiptRequest extends FormRequest
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
            'uuid_outlet' => 'required',
            'email'       => 'required|unique:App\Models\User\User\User,email',
            'phone'       => ['regex:/(\+62|62|0)8[1-9][0-9]{6,9}/', 'digits_between:11,13']
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
