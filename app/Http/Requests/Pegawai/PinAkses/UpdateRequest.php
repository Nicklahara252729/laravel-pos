<?php

namespace App\Http\Requests\Pegawai\PinAkses;

use Illuminate\Foundation\Http\FormRequest;

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
            'print_bill'                => 'in:yes|nullable',
            'manage_all_open_bills'     => 'in:yes|nullable',
            'apply_discount_bill_item'  => 'in:yes|nullable',
            'manage_discounts'          => 'in:yes|nullable',
            'issue_refunds'             => 'in:yes|nullable',
            'resend_receipts'           => 'in:yes|nullable',
            'record_invoice_payments'   => 'in:yes|nullable',
            'cancel_invoices'           => 'in:yes|nullable'
        ];
    }
}
