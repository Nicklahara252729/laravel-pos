<?php

namespace App\Http\Requests\Pegawai\DaftarPegawai;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name'                      => 'required',
            'email'                     => ['required', Rule::unique('users')->ignore($this->uuid_user, 'uuid_user')],
            'phone'                     => ['regex:/(\+62|62|0)8[1-9][0-9]{6,9}/', 'digits_between:11,13'],
            'pin'                       => 'string',
            'profile_photo_path'        => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'username'                  => ['nullable', Rule::unique('users')->ignore($this->uuid_user, 'uuid_user')]
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }
}
