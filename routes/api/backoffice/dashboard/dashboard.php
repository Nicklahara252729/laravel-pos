<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Dashboard\DashboardController;

Route::controller(DashboardController::class)
    ->name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::get('data', 'data')->name('data');
    });
