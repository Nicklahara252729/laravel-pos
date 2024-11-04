<?php

namespace App\Http\Requests\Pegawai\Akses;

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
            'access_name'                        => [
                'required',
                Rule::unique('accesses')->where(function ($query) {
                    $query->where('uuid_outlet', $this->uuidOutlet());
                    return $query->whereNot(function (Builder $query) {
                        $query->where('uuid_access', $this->uuid_access);
                    });
                })
            ],

            /**
             * app permission
             */
            'app_permission'                    => 'in:yes|nullable',
            'manage_all_open_bills'             => 'in:yes|nullable',
            'manage_discounts'                  => 'in:yes|nullable',
            'issue_refunds'                     => 'in:yes|nullable',
            'resend_receipts'                   => 'in:yes|nullable',
            'record_invoice_payments'           => 'in:yes|nullable',
            'cancel_invoices'                   => 'in:yes|nullable',
            'view_print_current_shift_details'  => 'in:yes|nullable',
            'manage_items'                      => 'in:yes|nullable',
            'manage_favorites'                  => 'in:yes|nullable',
            'edit_customer_information'         => 'in:yes|nullable',
            'charge_customers'                  => 'in:yes|nullable',
            'move_tables'                       => 'in:yes|nullable',

            /**
             * backoffiice permission
             */
            'backoffice_permission'             => 'in:yes|nullable',

            /**
             * dashboard
             */
            'dashboard'                         => 'in:yes|nullable',

            /**
             * laporan penjualan
             */
            'laporan_penjualan'                 => 'in:yes|nullable',
            'ringkasan_laporan'                 => 'in:yes|nullable',
            'keuntungan_kotor'                  => 'in:yes|nullable',
            'metode_pembayaran'                 => 'in:yes|nullable',
            'laporan_tipe_penjualan'            => 'in:yes|nullable',
            'penjualan_produk'                  => 'in:yes|nullable',
            'penjualan_kategori'                => 'in:yes|nullable',
            'modifier_sales'                    => 'in:yes|nullable',
            'diskon'                            => 'in:yes|nullable',
            'pajak'                             => 'in:yes|nullable',
            'gratifikasi'                       => 'in:yes|nullable',
            'collected_by'                      => 'in:yes|nullable',
            'shift'                             => 'in:yes|nullable',
            'riwayat_transaksi'                 => 'in:yes|nullable',

            /**
             * pembayaran
             */
            'pembayaran'                        => 'in:yes|nullable',
            'invoice'                           => 'in:yes|nullable',
            'checkout_setting'                  => 'in:yes|nullable',
            'metode'                            => 'in:yes|nullable',

            /**
             * produk
             */
            'produk'                            => 'in:yes|nullable',
            'daftar_produk'                     => 'in:yes|nullable',
            'modifier'                          => 'in:yes|nullable',
            'kategori_produk'                   => 'in:yes|nullable',
            'paket_bundle'                      => 'in:yes|nullable',
            'promo_produk'                      => 'in:yes|nullable',
            'diskon_produk'                     => 'in:yes|nullable',
            'pajak_produk'                      => 'in:yes|nullable',
            'gratuity'                          => 'in:yes|nullable',
            'tipe_penjualan'                    => 'in:yes|nullable',

            /**
             * bahan dan resep
             */
            'bahan_dan_resep'                   => 'in:yes|nullable',
            'daftar_bahan'                      => 'in:yes|nullable',
            'kategori_bahan'                    => 'in:yes|nullable',
            'resep'                             => 'in:yes|nullable',

            /**
             * inventori
             */
            'inventori'                         => 'in:yes|nullable',
            'ringkasan_inventori'               => 'in:yes|nullable',
            'purchase_order'                    => 'in:yes|nullable',

            /**
             * pelanggan
             */
            'pelanggan'                         => 'in:yes|nullable',

            /**
             * pegawai
             */
            'pegawai'                           => 'in:yes|nullable',
            'daftar_pegawai'                    => 'in:yes|nullable',
            'hak_akses'                         => 'in:yes|nullable',

            /**
             * outlet
             */
            'outlet'                            => 'in:yes|nullable',
            'receipt'                           => 'in:yes|nullable',
            'pengaturan_meja'                   => 'in:yes|nullable',

            /**
             * profile
             */
            'daftar_outlet'                     => 'in:yes|nullable',
            'pengaturan_akun'                   => 'in:yes|nullable',
            'pengaturan_umum'                   => 'in:yes|nullable',
        ];
    }

    public function uuidOutlet()
    {
        $request = Request();
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
    }

    public function prepareForValidation()
    {
        $menu = [
            'app_permission',
            'manage_all_open_bills',
            'manage_discounts',
            'issue_refunds',
            'resend_receipts',
            'record_invoice_payments',
            'cancel_invoices',
            'view_print_current_shift_details',
            'manage_items',
            'manage_favorites',
            'edit_customer_information',
            'charge_customers',
            'move_tables',
            'backoffice_permission',
            'dashboard',
            'laporan_penjualan',
            'ringkasan_laporan',
            'keuntungan_kotor',
            'metode_pembayaran',
            'laporan_tipe_penjualan',
            'penjualan_produk',
            'penjualan_kategori',
            'modifier_sales',
            'diskon',
            'pajak',
            'gratifikasi',
            'collected_by',
            'shift',
            'riwayat_transaksi',
            'pembayaran',
            'invoice',
            'checkout_setting',
            'metode',
            'produk',
            'daftar_produk',
            'modifier',
            'kategori_produk',
            'paket_bundle',
            'promo_produk',
            'diskon_produk',
            'pajak_produk',
            'gratuity',
            'tipe_penjualan',
            'bahan_dan_resep',
            'daftar_bahan',
            'kategori_bahan',
            'resep',
            'inventori',
            'ringkasan_inventori',
            'purchase_order',
            'pelanggan',
            'pegawai',
            'daftar_pegawai',
            'hak_akses',
            'outlet',
            'receipt',
            'pengaturan_meja',
            'daftar_outlet',
            'pengaturan_akun',
            'pengaturan_umum'
        ];
        foreach ($menu as $value) :
            if (!$this->has($value) || $this->input($value) === null || $this->input($value) === '') {
                $this->merge([$value => null]);
            }
        endforeach;
    }
}
