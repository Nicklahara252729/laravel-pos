<?php

use Illuminate\Support\Facades\Route;

Route::controller(Activity\ActivityController::class)
    ->name('activity.')
    ->prefix('activity')
    ->group(function () {
    });
