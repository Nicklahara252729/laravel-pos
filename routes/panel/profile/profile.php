<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Profile\Akun\AkunController;

Route::prefix('profile')->name('profile.')->group(function () {

    /**
     * daftar outlet
     */
    Route::name('daftar-outlet.')->prefix('daftar-outlet')->group(function () {
        Route::get('/', function () {
            return view('panel.profile.daftar-outlet.index', [
                'title' => breadcrumbAttribute()[10]
            ]);
        });
    });

    /**
     * akun
     */
    Route::name('akun.')->prefix('akun')->group(function () {
        Route::get('/', function () {
            return view('panel.profile.akun.index', [
                'title' => breadcrumbAttribute()[11]
            ]);
        })->name('index');
        Route::get('verify-email/{token}', [AkunController::class, 'verifyEmail'])->name('email.verify')->withoutMiddleware('auth:web');
    });

    /**
     * pengaturan
     */
    Route::name('pengaturan.')->prefix('pengaturan')->group(function () {
        Route::get('/', function () {
            return view('panel.profile.pengaturan.index', [
                'title' => breadcrumbAttribute()[14]
            ]);
        });
    });
});
