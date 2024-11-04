<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Notifikasi\NotifikasiController;

Route::controller(NotifikasiController::class)
    ->name('notifikasi.')
    ->prefix('notifikasi')
    ->group(function () {
        Route::get('current', 'current')->name('current');
        Route::get('data', 'data')->name('data');
    });
