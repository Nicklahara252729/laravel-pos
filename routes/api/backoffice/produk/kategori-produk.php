<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\KategoriProduk\KategoriProdukController;

Route::controller(KategoriProdukController::class)
    ->name('kategori-produk.')
    ->prefix('kategori-produk')
    ->group(function () {
        Route::get('data', 'data')->name('data');
        Route::get('get/{uuid_kategori_produk}', 'get')->name('get');
        Route::post('save', 'save')->name('save');
        Route::put('update/{uuid_kategori_produk}', 'update')->name('update');
        Route::put('assign-item/{uuid_kategori_produk}', 'assignItem')->name('assign-item');
        Route::delete('delete/{uuid_kategori_produk}', 'delete')->name('delete');
    });
