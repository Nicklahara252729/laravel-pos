<?php

namespace App\Http\Requests\Produk\Gratuity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

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
            'gratuity_name' => [
                'required',
                Rule::unique('gratuities')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                })->ignore($this->uuid_gratuity, 'uuid_gratuity')
            ],
            'amount'        => 'required|max:11'
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }
}
