<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\DaftarProduk\DaftarProdukController;

Route::controller(DaftarProdukController::class)
    ->name('daftar-produk.')
    ->prefix('daftar-produk')
    ->group(function () {
        Route::get('data', 'data')->name('data');
        Route::get('get/{uuidItem}', 'get')->name('get');
        Route::get('item-by-kategori/{uuidCategory}', 'itemByKategori')->name('item-by-kategori');
        Route::post('save', 'save')->name('save');
        Route::put('update/{uuidItem}', 'update')->name('update');
        Route::delete('delete/{uuidItem}', 'delete')->name('delete');
        Route::post('import', 'import')->name('import');
    });
