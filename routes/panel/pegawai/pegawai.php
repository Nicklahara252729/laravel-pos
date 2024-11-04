<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\Pegawai\DaftarPegawai\DaftarPegawaiController;

Route::prefix('pegawai')->name('pegawai.')->group(function () {

    /**
     * employee access 
     */
    Route::name('hak-akses.')->prefix('hak-akses')->group(function () {
        Route::get('/', function () {
            return view('panel.pegawai.hak-akses.index', [
                'title' => breadcrumbAttribute()[8],
                'subTitle' => 'Hak Akses'
            ]);
        });
    });

    /**
     * daftar pegawai
     */
    Route::name('daftar-pegawai.')->prefix('daftar-pegawai')->group(function () {
        Route::get('/', function () {
            return view('panel.pegawai.daftar-pegawai.index', [
                'title' => breadcrumbAttribute()[8],
                'subTitle' => 'Daftar Pegawai'
            ]);
        });
        Route::get('export/{uuidOutlet}', [DaftarPegawaiController::class, 'export'])->name('export');
    });

    /**
     * pin access
     */
    Route::name('pin-akses.')->prefix('pin-akses')->group(function () {
        Route::get('/', function () {
            return view('panel.pegawai.pin-akses.index', [
                'title' => breadcrumbAttribute()[8],
                'subTitle' => 'Pin Akses'
            ]);
        });
    });
});
