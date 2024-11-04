<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_access')->unique();
            $table->uuid('uuid_outlet')->nullable();
            $table->string('access_name');

            /**
             * app permission
             */
            $table->string('app_permission', 5)->nullable();
            $table->string('manage_all_open_bills', 5)->nullable();
            $table->string('manage_discounts', 5)->nullable();
            $table->string('issue_refunds', 5)->nullable();
            $table->string('resend_receipts', 5)->nullable();
            $table->string('record_invoice_payments', 5)->nullable();
            $table->string('cancel_invoices', 5)->nullable();
            $table->string('view_print_current_shift_details', 5)->nullable();
            $table->string('manage_items', 5)->nullable();
            $table->string('manage_favorites', 5)->nullable();
            $table->string('edit_customer_information', 5)->nullable();
            $table->string('charge_customers', 5)->nullable();
            $table->string('move_tables', 5)->nullable();

            /**
             * backoffice permission
             */
            $table->string('backoffice_permission', 5)->nullable();

            // dashboard
            $table->string('dashboard', 5)->nullable();

            // laporan penjualan
            $table->string('laporan', 5)->nullable();
            $table->string('ringkasan_laporan', 5)->nullable();
            $table->string('keuntungan_kotor', 5)->nullable();
            $table->string('metode_pembayaran', 5)->nullable();
            $table->string('laporan_tipe_penjualan', 5)->nullable();
            $table->string('penjualan_produk', 5)->nullable();
            $table->string('penjualan_kategori', 5)->nullable();
            $table->string('modifier_sales', 5)->nullable();
            $table->string('diskon', 5)->nullable();
            $table->string('pajak', 5)->nullable();
            $table->string('gratifikasi', 5)->nullable();
            $table->string('collected_by', 5)->nullable();
            $table->string('shift', 5)->nullable();
            $table->string('riwayat_transaksi', 5)->nullable();

            // pembayaran
            $table->string('pembayaran', 5)->nullable();
            $table->string('invoice', 5)->nullable();
            $table->string('checkout_setting', 5)->nullable();
            $table->string('metode', 5)->nullable();

            // produk
            $table->string('produk', 5)->nullable();
            $table->string('daftar_produk', 5)->nullable();
            $table->string('modifier', 5)->nullable();
            $table->string('kategori_produk', 5)->nullable();
            $table->string('paket_bundle', 5)->nullable();
            $table->string('promo_produk', 5)->nullable();
            $table->string('diskon_produk', 5)->nullable();
            $table->string('pajak_produk', 5)->nullable();
            $table->string('gratuity', 5)->nullable();
            $table->string('tipe_penjualan', 5)->nullable();

            // bahan dan resep
            $table->string('bahan_dan_resep', 5)->nullable();
            $table->string('daftar_bahan', 5)->nullable();
            $table->string('kategori_bahan', 5)->nullable();
            $table->string('resep', 5)->nullable();

            // inventori
            $table->string('inventori', 5)->nullable();
            $table->string('ringkasan_inventori', 5)->nullable();
            $table->string('purchase_order', 5)->nullable();

            // pelanggan
            $table->string('pelanggan', 5)->nullable();

            // pegawai
            $table->string('pegawai', 5)->nullable();
            $table->string('daftar_pegawai', 5)->nullable();
            $table->string('hak_akses', 5)->nullable();

            // outlet
            $table->string('outlet', 5)->nullable();
            $table->string('receipt', 5)->nullable();
            $table->string('pengaturan_meja', 5)->nullable();

            // profile
            $table->string('daftar_outlet', 5)->nullable();
            $table->string('pengaturan_akun', 5)->nullable();
            $table->string('pengaturan_umum', 5)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access');
    }
};
