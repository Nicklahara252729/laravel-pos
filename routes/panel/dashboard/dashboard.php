<?php

use Illuminate\Support\Facades\Route;

Route::name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', function () {
            return view('panel.dashboard.index', ['title' => breadcrumbAttribute()[0]]);
        });
    });
