<?php

use Illuminate\Support\Facades\Route;

Route::controller(Table\TableController::class)
    ->name('table.')
    ->prefix('table`')
    ->group(function () {
    });
