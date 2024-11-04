<?php

/**
 * component collection
 */

use Illuminate\Support\Facades\Route;

/**
 * route collection
 * portal segment
 * default. redirect, tracking
 */

use App\Http\Controllers\Default\DefaultController;

/**
 * default
 */
Route::get('/', [DefaultController::class, 'index']);