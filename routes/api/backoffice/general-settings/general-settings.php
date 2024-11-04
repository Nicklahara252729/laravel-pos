<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\GeneralSettings\GeneralSettings\GeneralSettingsController;
use App\Http\Controllers\Api\Backoffice\GeneralSettings\GeneralSettingAssign\GeneralSettingAssignController;

Route::name('general-settings.')->prefix('general-settings')->group(function () {

    /**
     * general setting
     */
    Route::controller(GeneralSettingsController::class)
        ->group(function () {
            Route::get('data', 'data')->name('data');
            Route::get('get/{param}', 'get')->name('get');
        });

    /**
     * general setting assign
     */
    Route::controller(GeneralSettingAssignController::class)
        ->name('assign.')
        ->prefix('assign')
        ->group(function () {
            Route::get('data', 'data')->name('data');
            Route::get('get/{uuid_general_setting}', 'get')->name('get');
            Route::put('update/{uuid_general_setting_assign}', 'update')->name('update');
        });
});
