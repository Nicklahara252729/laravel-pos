<?php

namespace App\Http\Requests\Profile\Akun;

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
            'name'               => 'required',
            'email'              => ['required', Rule::unique('users', 'email')->ignore(authAttribute()['uuidUser'], 'uuid_user')],
            'phone'              => ['regex:/(\+62|62|0)8[1-9][0-9]{6,9}/', 'digits_between:11,13', Rule::unique('users', 'phone')->ignore(authAttribute()['uuidUser'], 'uuid_user')],
            'profile_photo_path' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
