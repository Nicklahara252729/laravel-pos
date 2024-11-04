<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */

use App\Http\Controllers\Api\Backoffice\Produk\Modifier\Modifier\ModifierController;
use App\Http\Controllers\Api\Backoffice\Produk\Modifier\ModifierIngredient\ModifierIngredientController;
use App\Http\Controllers\Api\Backoffice\Produk\Modifier\ModifierItem\ModifierItemController;

Route::name('modifier.')->prefix('modifier')->group(function () {
    /**
     * modifier
     */
    Route::controller(ModifierController::class)
        ->group(function () {
            Route::get('data', 'data')->name('data');
            Route::get('get/{uudiModifier}', 'get')->name('get');
            Route::post('save', 'save')->name('save');
            Route::put('update/{uudiModifier}', 'update')->name('update');
            Route::delete('delete/{uudiModifier}', 'delete')->name('delete');
        });

    /**
     * modifier ingredient
     */
    Route::controller(ModifierIngredientController::class)
        ->name('ingredient.')
        ->prefix('ingredient')
        ->group(function () {
            Route::get('data/{uuidModifier}', 'data')->name('data');
            Route::get('get/{uudiModifierIngredient}', 'get')->name('get');
            Route::post('save', 'save')->name('save');
            Route::put('update/{uudiModifierIngredient}', 'update')->name('update');
            Route::delete('delete/{uudiModifierIngredient}', 'delete')->name('delete');
        });

    /**
     * modifier item
     */
    Route::controller(ModifierItemController::class)
        ->name('item.')
        ->prefix('item')
        ->group(function () {
            Route::get('data/{uuidModifier}', 'data')->name('data');
            Route::get('get/{uuidModifierItem}', 'get')->name('get');
            Route::post('save', 'save')->name('save');
            Route::put('update/{uuidModifierItem}', 'update')->name('update');
            Route::delete('delete/{uuidModifierItem}', 'delete')->name('delete');
        });
});
