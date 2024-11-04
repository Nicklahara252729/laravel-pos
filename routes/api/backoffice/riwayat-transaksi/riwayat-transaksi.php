<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\RiwayatTransaksi\RiwayatTransaksiController;

Route::controller(RiwayatTransaksiController::class)
    ->name('riwayat-transaksi.')
    ->prefix('riwayat-transaksi')
    ->group(function () {
        Route::get('total', 'total')->name('total');
        Route::get('data', 'data')->name('data');
        Route::get('get/{uuidTransaksi}/{uuidOutlet}', 'get')->name('get');
        Route::post('resend-receipt', 'resendReceipt')->name('resend-receipt');
        Route::post('issue-refund', 'issueRefund')->name('issue-refund');
        Route::get('item/{uuidTransaksi}/{uuidOutlet}', 'item')->name('item');
    });
