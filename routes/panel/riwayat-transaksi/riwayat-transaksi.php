<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\RiwayatTransaksi\RiwayatTransaksiController;

Route::name('riwayat-transaksi.')->prefix('riwayat-transaksi')->group(function () {
    Route::get('/', function () {
        return view('panel.riwayat-transaksi.index', [
            'title' => breadcrumbAttribute()[2]
        ]);
    });
    Route::get('export/transaksi/{uuidOutlet}', [RiwayatTransaksiController::class, 'exportTransaksi'])->name('export.transaksi');
    Route::get('export/item-detail/{uuidOutlet}', [RiwayatTransaksiController::class, 'exportItemDetail'])->name('export.item-detail');
});
