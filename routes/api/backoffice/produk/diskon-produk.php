<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\DiskonProduk\DiskonProdukController;

Route::controller(DiskonProdukController::class)
    ->name('diskon-produk.')
    ->prefix('diskon-produk')
    ->group(function () {
        Route::get('data', 'data')->name('data');
        Route::get('get/{uuidDiscount}', 'get')->name('get');
        Route::post('save', 'save')->name('save');
        Route::put('update/{uuidDiscount}', 'update')->name('update');
        Route::delete('delete/{uuidDiscount}', 'delete')->name('delete');
    });
