<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Pembayaran\CheckoutSetting\CheckoutSettingController;
use App\Http\Controllers\Api\Backoffice\Pembayaran\Invoice\InvoiceController;
use App\Http\Controllers\Api\Backoffice\Pembayaran\MetodePembayaran\MetodePembayaranController;

Route::name('pembayaran.')->prefix('pembayaran')->group(function () {

    /**
     * checkout  setting
     */
    Route::controller(CheckoutSettingController::class)
        ->name('checkout-setting.')
        ->prefix('checkout-setting')
        ->group(function () {
            Route::get('get/{uuidOutlet}', 'get')->name('.get');
            Route::put('update/{uuidOutlet}', 'update')->name('.update');
        });

    /**
     * invoice
     */
    Route::controller(InvoiceController::class)
        ->name('invoice.')
        ->prefix('invoice')
        ->group(function () {
            Route::get('data', 'data')->name('data');
            Route::get('get/{uuidInvoice}', 'get')->name('get');
            Route::put('update/{uuidInvoice}', 'update')->name('update');
            Route::put('resend/{uuidInvoice}', 'resend')->name('resend');
            Route::put('cancel/{uuidInvoice}', 'cancel')->name('cancel');

        });

    /**
     * metode pembayaran
     */
    Route::controller(MetodePembayaranController::class)
        ->name('metode-pembayaran.')
        ->prefix('metode-pembayaran')
        ->group(function () {
            Route::get('payment-list', 'paymentList')->name('paymentList');
            Route::get('data', 'data')->name('data');
            Route::get('get/{uuidPaymentConfiguration}', 'get')->name('.get');
            Route::post('save', 'save')->name('.save');
            Route::put('update/{uuidPaymentConfiguration}', 'update')->name('.update');
            Route::delete('delete/{uuidPaymentConfiguration}', 'delete')->name('.delete');
        });
});
