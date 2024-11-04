<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\Outlet\PengaturanMeja\PengaturanMejaController;

Route::prefix('outlet')->name('outlet.')->group(function () {

    /**
     * table group
     */
    Route::name('pengaturan-meja.')->prefix('pengaturan-meja')->group(function () {
        Route::get('/', function () {
            return view('panel.outlet.pengaturan-meja.index', [
                'title' => breadcrumbAttribute()[9],
                'subTitle' => 'Pengaturan Meja'
            ]);
        });
        Route::get('export/laporan/void/{uuidOutlet}', [PengaturanMejaController::class, 'export'])->name('export');
    });


    /**
     * receipt
     */
    Route::name('receipt.')->prefix('receipt')->group(function () {
        Route::get('/', function () {
            return view('panel.outlet.receipt.index', [
                'title' => breadcrumbAttribute()[9],
                'subTitle' => 'Receipt'
            ]);
        });
    });
});
