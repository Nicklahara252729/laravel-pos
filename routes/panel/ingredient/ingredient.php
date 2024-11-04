<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\Ingredient\DaftarBahan\DaftarBahanController;
use App\Http\Controllers\Api\Backoffice\Ingredient\Resep\ResepController;

Route::prefix('ingredient')->name('ingredient.')->group(function () {

    /**
     * ingridient library
     */
    Route::name('daftar-bahan.')
        ->prefix('daftar-bahan')
        ->group(function () {
            Route::get('/', function () {
                return view('panel.ingredient.daftar-bahan.index', [
                    'title' => breadcrumbAttribute()[5],
                    'subTitle' => 'Daftar Bahan'
                ]);
            });
            Route::get('export/{uuidOutlet}', [DaftarBahanController::class, 'export'])->name('export');
        });

    /**
     * ingridient category
     */
    Route::name('kategori-bahan.')
        ->prefix('kategori-bahan')
        ->group(function () {
            Route::get('/', function () {
                return view('panel.ingredient.kategori-bahan.index', [
                    'title' => breadcrumbAttribute()[5],
                    'subTitle' => 'Kategori Bahan'
                ]);
            });
        });

    /***
     * recipes
     */
    Route::name('resep.')
        ->prefix('resep')
        ->group(function () {
            Route::get('/', function () {
                return view('panel.ingredient.resep.index', [
                    'title' => breadcrumbAttribute()[5],
                    'subTitle' => 'Resep'
                ]);
            });
            Route::get('export/{uuidOutlet}', [ResepController::class, 'export'])->name('export');
        });
});
