<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Outlet\PengaturanMeja\PengaturanMejaController;
use App\Http\Controllers\Api\Backoffice\Outlet\Receipt\ReceiptController;

Route::name('outlet.')->prefix('outlet')->group(function () {

    /**
     * pengaturan meja
     */
    Route::controller(PengaturanMejaController::class)
        ->name('pengaturan-meja.')
        ->prefix('pengaturan-meja')
        ->group(function () {

            /**
             * group meja
             */
            Route::name('grup-meja.')
                ->prefix('grup-meja')
                ->group(function () {
                    Route::get('data', 'groupMejaData')->name('data');
                    Route::get('get/{uuidTable}', 'groupMejaGet')->name('get');
                    Route::post('save', 'groupMejaSave')->name('save');
                    Route::put('duplicate/{uuidTable}', 'groupMejaDuplicate')->name('duplicate');
                    Route::put('update/{uuidTable}', 'groupMejaUpdate')->name('update');
                    Route::put('atur-meja/{uuidTable}', 'groupMejaAturMeja')->name('atur-meja');
                    Route::delete('delete/{uuidTable}', 'groupMejaDelete')->name('delete');
                });

            /**
             * laporan
             */
            Route::name('laporan.')
                ->prefix('laporan')
                ->group(function () {
                    Route::get('total', 'laporanTotal')->name('total');
                    Route::get('data', 'laporanData')->name('data');
                    Route::get('transaksi/{uuidTable}', 'laporanTransaksi')->name('transaksi');
                    Route::get('void/{uuidOutlet}', 'laporanVoid')->name('void');
                });
        });

    /**
     * receipt
     */
    Route::controller(ReceiptController::class)
        ->name('receipt.')
        ->prefix('receipt')
        ->group(function () {
            Route::get('preview', 'preview')->name('preview');
            Route::put('update', 'update')->name('update');
        });
});
