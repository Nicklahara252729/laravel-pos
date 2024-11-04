<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Profile\DaftarOutlet\DaftarOutletController;
use App\Http\Controllers\Api\Backoffice\Profile\Akun\AkunController;
use App\Http\Controllers\Api\Backoffice\Profile\Pengaturan\PengaturanController;

Route::name('profile.')->prefix('profile')->group(function () {

    /**
     * daftar outlet
     */
    Route::controller(DaftarOutletController::class)
        ->name('daftar-outlet.')
        ->prefix('daftar-outlet')
        ->group(function () {
            Route::get('data', 'data')->name('data')->withoutMiddleware('outlet');
            Route::get('get/{uuid_outlet}', 'get')->name('get')->withoutMiddleware('outlet');
            Route::post('save', 'save')->name('save')->withoutMiddleware('outlet');
            Route::put('update/{uuid_outlet}', 'update')->name('update')->withoutMiddleware('outlet');
            Route::delete('delete/{uuid_outlet}', 'delete')->name('delete')->withoutMiddleware('outlet');
        });

    /**
     * akun
     */
    Route::controller(AkunController::class)
        ->name('akun.')
        ->prefix('akun')
        ->group(function () {
            Route::get('get', 'get')->name('get');
            Route::put('ubah-password', 'ubahPassword')->name('ubahPassword');
            Route::put('update', 'update')->name('update');
            Route::put('contact-verification', 'contactVerificationLink')->name('contactVerificationLink');
            Route::post('verify-contact', 'verifyContact')->name('verifyContact');
            Route::put('email-verification', 'emailVerificationLink')->name('emailVerificationLink');
        });

    /**
     * pengaturan
     */
    Route::controller(PengaturanController::class)
        ->name('pengaturan.')
        ->prefix('pengaturan')
        ->group(function () {
            Route::get('get', 'get')->name('get');
            Route::put('update/sistem', 'updateSistem')->name('updateSistem');
            Route::put('update/info-bisnis', 'updateInfoBisnis')->name('updateInfoBisnis');
            Route::put('update/npwp', 'updateNpwp')->name('updateNpwp');
        });
});
