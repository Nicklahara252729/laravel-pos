<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\PaketBundle\PaketBundleController;

Route::controller(PaketBundleController::class)
    ->name('paket-bundle.')
    ->prefix('paket-bundle')
    ->withoutMiddleware('outlet')
    ->group(function () {
        Route::get('data', 'data')->name('data');
        Route::get('get/{uuidBundlePackage}', 'get')->name('get');
        Route::post('save', 'save')->name('save');
        Route::put('update/{uuidBundlePackage}', 'update')->name('update');
        Route::delete('delete/{uuidBundlePackage}', 'delete')->name('delete');
    });
