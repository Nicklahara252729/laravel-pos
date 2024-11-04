<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Laporan\RingkasanLaporan\RingkasanLaporanController;
use App\Http\Controllers\Api\Backoffice\Laporan\CollectedBy\CollectedByController;
use App\Http\Controllers\Api\Backoffice\Laporan\Diskon\DiskonController;
use App\Http\Controllers\Api\Backoffice\Laporan\Gratifikasi\GratifikasiController;
use App\Http\Controllers\Api\Backoffice\Laporan\MetodePembayaran\MetodePembayaranController;
use App\Http\Controllers\Api\Backoffice\Laporan\ModifierSales\ModifierSalesController;
use App\Http\Controllers\Api\Backoffice\Laporan\Pajak\PajakController;
use App\Http\Controllers\Api\Backoffice\Laporan\PenjualanKategori\PenjualanKategoriController;
use App\Http\Controllers\Api\Backoffice\Laporan\PenjualanProduk\PenjualanProdukController;
use App\Http\Controllers\Api\Backoffice\Laporan\Shift\ShiftController;
use App\Http\Controllers\Api\Backoffice\Laporan\TipePenjualan\TipePenjualanController;
use App\Http\Controllers\Api\Backoffice\Laporan\KeuntunganKotor\KeuntunganKotorController;

Route::name('laporan.')->prefix('laporan')->group(function () {

    /**
     * ringkasan laporan
     */
    Route::controller(RingkasanLaporanController::class)
        ->name('ringkasan-laporan.')
        ->prefix('ringkasan-laporan')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * collected by
     */
    Route::controller(CollectedByController::class)
        ->name('collected-by.')
        ->prefix('collected-by')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * diskon
     */
    Route::controller(DiskonController::class)
        ->name('diskon.')
        ->prefix('diskon')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * gratifikasi
     */
    Route::controller(GratifikasiController::class)
        ->name('gratifikasi.')
        ->prefix('gratifikasi')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * metode pembayaran
     */
    Route::controller(MetodePembayaranController::class)
        ->name('metode-pembayaran.')
        ->prefix('metode-pembayaran')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * modifier sales
     */
    Route::controller(ModifierSalesController::class)
        ->name('modifier-sales.')
        ->prefix('modifier-sales')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * pajak
     */
    Route::controller(PajakController::class)
        ->name('pajak.')
        ->prefix('pajak')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * penjualan kategori
     */
    Route::controller(PenjualanKategoriController::class)
        ->name('penjualan-kategori.')
        ->prefix('penjualan-kategori')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * penjualan produk
     */
    Route::controller(PenjualanProdukController::class)
        ->name('penjualan-produk.')
        ->prefix('penjualan-produk')
        ->group(function () {
            Route::get('data/income', 'dataIncome')->name('data');
            Route::get('data/quantity', 'dataQuantity')->name('data');
        });

    /**
     * shift
     */
    Route::controller(ShiftController::class)
        ->name('shift.')
        ->prefix('shift')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * tipe penjualan
     */
    Route::controller(TipePenjualanController::class)
        ->name('tipe-penjualan.')
        ->prefix('tipe-penjualan')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });

    /**
     * keuntungan kotor
     */
    Route::controller(KeuntunganKotorController::class)
        ->name('keuntungan-kotor.')
        ->prefix('keuntungan-kotor')
        ->group(function () {
            Route::get('data', 'data')->name('data');
        });
});
