<?php

use Illuminate\Support\Facades\Route;

Route::controller(Pustaka\PustakaController::class)
    ->name('pustaka.')
    ->prefix('pustaka')
    ->group(function () {
    });
