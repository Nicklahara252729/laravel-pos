<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Pelanggan\PelangganController;

Route::controller(PelangganController::class)
    ->name('pelanggan.')
    ->prefix('pelanggan')
    ->group(function () {
        Route::get('data', 'data')->name('.data');
        Route::get('export', 'export')->name('.export');
        Route::post('import', 'import')->name('.import');
        Route::get('get/{uuidPelanggan}', 'get')->name('.get');
        Route::get('receipt/{uuidTransaksi}', 'receipt')->name('.receipt');
        Route::get('transaksi/{uuidPelanggan}', 'transaksi')->name('.transaksi');
        Route::get('search', 'search')->name('.search');
    });
