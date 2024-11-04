<?php

namespace App\Http\Requests\RiwayatTransaksi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class IssueRefundRequest extends FormRequest
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
             * data transaction
             */
            'uuid_transaction' => 'required',
            'tanggal'          => 'required',
            'refund_by'        => 'required',
            'reason_other'     => 'nullable',
            'collected_by'     => 'nullable',
            'gratuity'         => 'nullable',
            'tax'              => 'nullable',

            /**
             * item
             */
            'uuid_item.*'      => 'required',
            'item_name.*'      => 'required',
            'item_qty.*'       => 'required',
            'item_price.*'     => 'required',
            'modifier.*'       => 'nullable',
            'discount.*'       => 'nullable'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tanggal' => Carbon::now()->toDateTimeString(),
            'refund_by' => authAttribute()['uuidUser'],
        ]);
    }
}
