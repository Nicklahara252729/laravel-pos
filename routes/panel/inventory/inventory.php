<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Inventory\RingkasanInventory\RingkasanInventoryController;
use App\Http\Controllers\Api\Backoffice\Inventory\PurchasingOrder\PurchasingOrderController;

Route::prefix('inventory')->name('inventory.')->group(function () {

    /**
     * ringkasan inventori
     */
    Route::name('ringkasan-inventory.')
        ->prefix('ringkasan-inventory')
        ->group(function () {
            Route::get('/', function () {
                return view('panel.inventory.ringkasan-inventory.index', [
                    'title' => breadcrumbAttribute()[6],
                    'subTitle' => 'Ringkasan Inventory'
                ]);
            });
            Route::get('export/{uuidOutlet}', [RingkasanInventoryController::class, 'export'])->name('export');
        });

    /**
     * purchasing order
     */
    Route::name('purchasing-order.')
        ->prefix('purchasing-order')
        ->group(function () {
            Route::get('/', function () {
                return view('panel.inventory.purchasing-order.index', [
                    'title' => breadcrumbAttribute()[6],
                    'subTitle' => 'Purchasing Order'
                ]);
            });
            Route::get('export/{uuidOutlet}', [PurchasingOrderController::class, 'export'])->name('export');
        });
});
