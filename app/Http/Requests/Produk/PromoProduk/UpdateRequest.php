<?php

namespace App\Http\Requests\Produk\PromoProduk;

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
             * promo
             */
            'promo_name'        => [
                'required',
                Rule::unique('promos')->ignore($this->uuidPromo, 'uuid_promo')
            ],
            'promo_type'        => 'required|in:discount,free,price cut',
            'reward_type'       => 'nullable|in:currency,percent',
            'reward_qty'        => 'nullable|in:currency,percent',
            'config'            => 'required|in:multiple,time periode',
            'config_date_from'  => 'nullable|date',
            'config_date_until' => 'nullable|date',
            'config_hour_from'  => 'nullable|string',
            'config_hour_until' => 'nullable|string',
            'config_day.*'        => 'nullable|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',

            /**
             * promo assign outlet
             */
            'uuid_outlet.*'     => 'nullable',

            /**
             * promo assign sales type
             */
            'uuid_sales_type.*' => 'nullable',

            /**
             * promo purchase
             */
            'purchase_type' => 'nullable|in:item,category',
            'qty_purchase' => 'nullable|integer',
            'uuid_category'     => [
                'nullable',
                Rule::exists('categories')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                })
            ],

            /**
             * promo items
             */
            'uuid_item.*'     => [
                'nullable',
                Rule::exists('items')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                })
            ],
            'uuid_item_price_variant.*' => ['nullable'],
            'qty_item.*' => ['nullable'],
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }
}
