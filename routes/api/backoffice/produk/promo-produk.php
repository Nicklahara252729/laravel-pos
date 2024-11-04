<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\PromoProduk\PromoProdukController;

Route::controller(PromoProdukController::class)
    ->name('promo-produk.')
    ->prefix('promo-produk')
    ->withoutMiddleware('outlet')
    ->group(function () {
        Route::get('data', 'data')->name('data');
        Route::get('get/{uuidPromo}', 'get')->name('get');
        Route::post('save', 'save')->name('save');
        Route::put('update/{uuidPromo}', 'update')->name('update');
        Route::delete('delete/{uuidPromo}', 'delete')->name('delete');
    });
