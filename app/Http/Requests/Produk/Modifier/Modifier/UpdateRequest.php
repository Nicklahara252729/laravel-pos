<?php

namespace App\Http\Requests\Produk\Modifier\Modifier;

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
            
            /**
             * modifier
             */
            'modifier_name'     => [
                'required',
                Rule::unique('modifiers')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                })->ignore($this->uuidModifier)
            ],
            'is_limit'          => 'required|in:yes,no',
            'is_stock'          => 'required|in:yes,no',
            'is_limit_required' => 'required|in:yes,no',
            'max_number_limit'  => 'required|integer',
            'min_number_limit'  => 'required|integer',

            /**
             * modifier option
             */
            'option_name.*'     => 'required|string',
            'option_price.*'    => 'required|integer',
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }
}