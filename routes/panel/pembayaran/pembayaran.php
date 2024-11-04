<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\Pembayaran\Invoice\InvoiceController;

Route::prefix('pembayaran')->name('pembayaran.')->group(function () {

    /**
     * invoice
     */
    Route::name('invoice.')->prefix('invoice')->group(function () {
        Route::get('/', function () {
            return view('panel.pembayaran.invoice.index', [
                'title' => breadcrumbAttribute()[3],
                'subTitle' => 'Invoice'
            ]);
        });
        Route::get('export/transaksi/{uuidInvoice}', [InvoiceController::class, 'exportTransaksi'])->name('exportTransaksi');
        Route::get('export/detail/{uuidInvoice}', [InvoiceController::class, 'exportDetail'])->name('exportDetail');
    });

    /**
     * checkout
     */
    Route::name('checkout-setting.')->prefix('checkout-setting')->group(function () {
        Route::get('/', function () {
            return view('panel.pembayaran.checkout-setting.index', [
                'title' => breadcrumbAttribute()[3],
                'subTitle' => 'Checkout Setting'
            ]);
        });
    });

    /**
     * payment method
     */
    Route::name('metode-pembayaran.')->prefix('metode-pembayaran')->group(function () {
        Route::get('/', function () {
            return view('panel.pembayaran.metode-pembayaran.index', [
                'title' => breadcrumbAttribute()[3],
                'subTitle' => 'Metode Pembayaran'
            ]);
        });
    });
});
