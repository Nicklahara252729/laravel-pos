<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Ingredient\DaftarBahan\DaftarBahanController;
use App\Http\Controllers\Api\Backoffice\Ingredient\KategoriBahan\KategoriBahanController;
use App\Http\Controllers\Api\Backoffice\Ingredient\Resep\ResepController;

Route::name('ingredient.')->prefix('ingredient')->group(function () {

    /**
     * daftar bahan
     */
    Route::controller(DaftarBahanController::class)
        ->name('daftar-bahan.')
        ->prefix('daftar-bahan')
        ->group(function () {
            Route::get('data', 'data')->name('.data');
            Route::post('save', 'save')->name('.save');
            Route::put('update/{uuidIngredientLibrary}', 'update')->name('.update');
            Route::delete('delete/{uuidIngredientLibrary}', 'delete')->name('.delete');
            Route::get('get/{uuidIngredientLibrary}', 'get')->name('.get');
            Route::post('import/replace', 'importReplace')->name('.import-repalce');
            Route::post('import/change', 'importChange')->name('.import-change');
        });

    /**
     * kategori bahan
     */
    Route::controller(KategoriBahanController::class)
        ->name('kategori-bahan.')
        ->prefix('kategori-bahan')
        ->group(function () {
            Route::get('data', 'data')->name('data');
            Route::post('save', 'save')->name('save');
            Route::put('update/{uuid_ingredient_category}', 'update')->name('update');
            Route::delete('delete/{uuid_ingredient_category}', 'delete')->name('delete');
            Route::get('get/{uuid_ingredient_category}', 'get')->name('get');
            Route::put('assign-item/{uuid_ingredient_category}', 'assignItem')->name('assign-item');
        });

    /**
     * resep
     */
    Route::controller(ResepController::class)
        ->name('resep.')
        ->prefix('resep')
        ->group(function () {
            Route::get('data/produk', 'dataProduk')->name('data.produk');
            Route::get('data/bahan-setengah-jadi', 'dataHalfRaw')->name('data.bahan-setengah-jadi');
            Route::post('save', 'save')->name('save');
            Route::put('update/{uuidRecipe}', 'update')->name('update');
            Route::delete('delete/{uuidRecipe}', 'delete')->name('delete');
            Route::get('get/{uuidRecipe}', 'get')->name('get');
            Route::post('import', 'import')->name('import');
        });
});
