<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\Gratuity\GratuityController;

Route::controller(GratuityController::class)
    ->name('gratuity.')
    ->prefix('gratuity')
    ->group(function () {
        Route::get('data', 'data')->name('data');
        Route::get('get/{uuid_gratuity}', 'get')->name('get');
        Route::post('save', 'save')->name('save');
        Route::put('update/{uuid_gratuity}', 'update')->name('update');
        Route::delete('delete/{uuid_gratuity}', 'delete')->name('delete');
    });
