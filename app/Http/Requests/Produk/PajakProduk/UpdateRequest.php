<?php

namespace App\Http\Requests\Produk\PajakProduk;

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
            'tax_information'   => [
                'required',
                Rule::unique('taxes')->where(function ($query) {
                    $query->where('uuid_outlet', $this->uuidOutlet());
                    $query->whereNull('deleted_at');
                    return $query->whereNot(function (Builder $query) {
                        $query->where('uuid_tax', $this->uuid_tax);
                    });
                })
            ],
            'amount'            => 'required'
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }
}
