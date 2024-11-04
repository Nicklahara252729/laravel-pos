<?php

use Illuminate\Support\Facades\Route;

/**
 * auth
 */
Route::name('auth')->prefix('auth')->group(function () {
    Route::post('login', [App\Http\Controllers\Api\Auth\Login\LoginController::class, 'login'])->name('.login')->withoutMiddleware(['auth:api', 'signature']);
    Route::post('logout', [App\Http\Controllers\Api\Auth\Logout\LogoutController::class, 'logout'])->name('.logout');
});
