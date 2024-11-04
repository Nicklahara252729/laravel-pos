<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Inventory\RingkasanInventory\RingkasanInventoryController;
use App\Http\Controllers\Api\Backoffice\Inventory\PurchasingOrder\PurchasingOrderController;

Route::name('inventory.')->prefix('inventory')->group(function () {

    /**
     * ringkasan inventory
     */
    Route::controller(RingkasanInventoryController::class)
        ->name('ringkasan-inventory.')
        ->prefix('ringkasan-inventory')
        ->group(function () {
            Route::get('data', 'data')->name('.data');
        });

    /**
     * purchasing order
     */
    Route::controller(PurchasingOrderController::class)
        ->name('purchasing-order.')
        ->prefix('purchasing-order')
        ->group(function () {
            Route::get('data', 'data')->name('data');
            Route::post('save', 'save')->name('save');
            Route::put('update/{uuidPo}', 'update')->name('update');
            Route::put('reject/{uuidPo}', 'reject')->name('reject');
            Route::put('update-proses-pesanan/{uuidPo}', 'updateProsesPesanan')->name('update-proses-pesanan');
            Route::put('hentikan-pemenuhan/{uuidPo}', 'hentikanPemenuhan')->name('hentikan-pemenuhan');
            Route::get('get/{uuidPo}', 'get')->name('get');
            Route::post('import', 'import')->name('import');
            Route::get('riwayat/{uuidPo}', 'riwayat')->name('riwayat');
        });
});
