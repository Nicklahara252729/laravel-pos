<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\PajakProduk\PajakProdukController;

Route::controller(PajakProdukController::class)
    ->name('pajak-produk.')
    ->prefix('pajak-produk')
    ->group(function () {
        Route::get('data', 'data')->name('data');
        Route::get('get/{uuid_tax}', 'get')->name('get');
        Route::post('save', 'save')->name('save');
        Route::put('update/{uuid_tax}', 'update')->name('update');
        Route::delete('delete/{uuid_tax}', 'delete')->name('delete');
    });
