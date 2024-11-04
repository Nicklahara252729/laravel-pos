<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\TipePenjualan\TipePenjualanController;

Route::controller(TipePenjualanController::class)
    ->name('tipe-penjualan.')
    ->prefix('tipe-penjualan')
    ->group(function () {
        Route::get('data', 'data')->name('.data');
        Route::get('get/{uuid_sales_type}', 'get')->name('.get');
        Route::post('save', 'save')->name('.save');
        Route::put('update/{uuid_sales_type}', 'update')->name('.update');
        Route::delete('delete/{uuid_sales_type}', 'delete')->name('.delete');
    });
