<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Pegawai\Akses\AksesController;
use App\Http\Controllers\Api\Backoffice\Pegawai\DaftarPegawai\DaftarPegawaiController;
use App\Http\Controllers\Api\Backoffice\Pegawai\PinAkses\PinAksesController;

Route::name('pegawai.')->prefix('pegawai')->group(function () {

    /**
     * access
     */
    Route::controller(AksesController::class)
        ->name('akses.')
        ->prefix('akses')
        ->group(function () {
            Route::get('data', 'data')->name('data');
            Route::get('get/{uuid_access}', 'get')->name('get');
            Route::post('save', 'save')->name('save');
            Route::put('update/{uuid_access}', 'update')->name('update');
            Route::delete('delete/{uuid_access}', 'delete')->name('delete');
        });

    /**
     * daftar pegawai
     */
    Route::controller(DaftarPegawaiController::class)
        ->name('daftar-pegawai.')
        ->prefix('daftar-pegawai')
        ->group(function () {
            Route::get('data/{status}', 'data')->name('data');
            Route::get('get/{uuid_user}', 'get')->name('get');
            Route::post('save', 'save')->name('save');
            Route::post('import', 'import')->name('import');
            Route::put('update/{uuid_user}', 'update')->name('update');
            Route::put('update/password/{uuid_user}', 'updatePassword')->name('update.password');
            Route::put('restore/{uuid_user}', 'restore')->name('restore');
            Route::delete('delete/{uuid_user}', 'delete')->name('delete');
            Route::delete('delete/permanent/{uuid_user}', 'deletePermanent')->name('delete.permanen');
        });

    /**
     * pin access
     */
    Route::controller(PinAksesController::class)
        ->name('pin-akses.')
        ->prefix('pin-akses')
        ->group(function () {
            Route::get('data', 'data')->name('data');
            Route::get('get/{uuid_user}', 'get')->name('get');
            Route::put('update/{uuid_user}', 'update')->name('update');
        });
});
