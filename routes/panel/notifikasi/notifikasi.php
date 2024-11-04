<?php

use Illuminate\Support\Facades\Route;

Route::name('notifikasi')->prefix('notifikasi')->group(function () {
    Route::get('/', function () {
        return view('panel.notifikasi.index', [
            'title' => breadcrumbAttribute()[13]
        ]);
    });
});
