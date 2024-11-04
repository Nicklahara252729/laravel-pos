<?php

namespace App\Http\Requests\Produk\PaketBundle;

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

            /**
             * bundle package
             */
            'bundle_package_image'  => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
            'bundle_name'           => 'required|string|unique:App\Models\BundlePackage\BundlePackage\BundlePackage,bundle_name',
            'bundle_price'          => 'required|integer',
            'is_multiple_price'     => 'nullable|in:yes,no',
            'status'                => 'required|in:active,deactive',

            /**
             * bundle package assign
             */
            'uuid_outlet.*'         => 'nullable|string|exists:App\Models\Outlet\Outlet,uuid_outlet',

            /**
             * bundle package item
             */
            'uuid_item.*'           => 'nullable|string',
            'qty_item.*'            => 'nullable|integer',

            /**
             * bundle package multiple
             */
            'uuid_sales_type'       => 'nullable|string',
            'price'                 => 'nullable|integer',
        ];
    }
}
