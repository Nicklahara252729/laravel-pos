<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\Pelanggan\PelangganController;

Route::name('pelanggan.')->prefix('pelanggan')->group(function () {
    Route::get('/', function () {
        return view('panel.pelanggan.index', [
            'title' => breadcrumbAttribute()[7]
        ]);
    });
    Route::get('export/{uuidOutlet}', [PelangganController::class, 'export'])->name('export');
});
