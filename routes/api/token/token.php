<?php

use Illuminate\Support\Facades\Route;

Route::controller(Token\TokenController::class)
    ->name('token')
    ->prefix('token')
    ->group(function () {
        Route::get('validation', 'validation')->name('.validation');
        Route::post('refresh', 'refresh')->name('.refresh');
    });
