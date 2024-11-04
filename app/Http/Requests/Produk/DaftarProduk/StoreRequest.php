<?php

namespace App\Http\Requests\Produk\DaftarProduk;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\ItemMultiplePriceVariant;

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

            /**
             * item
             */
            'uuid_outlet'       => 'required',
            'product_name'      => [
                'required',
                Rule::unique('items')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                })
            ],
            'uuid_category'     => [
                'required',
                Rule::exists('categories')->where(function ($query) {
                    return $query->where('uuid_outlet', $this->uuidOutlet());
                })
            ],
            'description'       => 'required|string',
            'is_order_self'     => 'required|in:yes,no',
            'condition'         => 'nullable|in:new,refurbished,used',
            'weight'            => 'nullable|string',
            'weight_unit'       => 'nullable|in:gr,kg',
            'dimension_length'  => 'nullable|string',
            'dimension_width'   => 'nullable|string',
            'dimension_height'  => 'nullable|string',
            'dimension_unit'    => 'nullable|in:m,cm,inch',
            'is_pre_order'      => 'nullable|in:yes,no',
            'processing_time'   => 'nullable|integer',
            'is_multiple_price' => 'nullable|in:yes,no',
            'price'             => 'nullable|integer',
            'sku'               => 'nullable|string',
            'photo'             => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',

            /**
             * item order self image
             */
            'product_image.*'   => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',

            /**
             * item price variant
             */
            'variant_name.*'    => 'nullable|string',
            'variant_price.*'   => 'nullable|integer',
            'variant_sku.*'     => 'nullable|string',

            /**
             * item multiple price variant
             */
            'uuid_sales_type.*'     => [
                'required',
                new ItemMultiplePriceVariant('sales_types', 'uuid_sales_type', $this->uuidOutlet())
            ],
            'multiple_variant_name.*'  => 'nullable|string',
            'multiple_variant_sku.*'   => 'nullable|string',
            'multiple_variant_price.*' => 'nullable|integer',
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
