<?php

use Illuminate\Support\Facades\Route;

Route::controller(Pos\PosController::class)
    ->name('pos.')
    ->prefix('pos')
    ->group(function () {
    });
