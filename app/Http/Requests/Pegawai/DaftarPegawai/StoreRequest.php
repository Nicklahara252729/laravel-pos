<?php

namespace App\Http\Requests\Pegawai\DaftarPegawai;

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
            'uuid_access'               => [
                'required',
                Rule::exists('accesses')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                })
            ],
            'uuid_outlet'               => 'required',
            'name'                      => 'required',
            'email'                     => 'required|unique:App\Models\User\User\User,email',
            'phone'                     => ['regex:/(\+62|62|0)8[1-9][0-9]{6,9}/', 'digits_between:11,13'],
            'pin'                       => 'nullable|integer',
            'password'                  => 'required',
            'profile_photo_path'        => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'username'                  => 'nullable|unique:App\Models\User\User\User,username'
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
