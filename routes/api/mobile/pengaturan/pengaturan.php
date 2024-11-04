<?php

use Illuminate\Support\Facades\Route;

Route::controller(Pengaturan\PengaturanController::class)
    ->name('pengaturan.')
    ->prefix('pengaturan')
    ->group(function () {
    });
