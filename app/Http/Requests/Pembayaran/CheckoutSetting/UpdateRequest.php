<?php

namespace App\Http\Requests\Pembayaran\CheckoutSetting;

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
            'gratuity_activation' => 'nullable',
            'tax_activation' => 'nullable',
            'rounding_activation' => 'nullable',
            'tax_gratuity_type' => 'nullable',
            'rounding_type' => 'nullable',
            'rounding_number' => 'nullable',
            'stock_limit' => 'nullable',
            'stock_limit_type' => 'nullable'
        ];
    }
}
