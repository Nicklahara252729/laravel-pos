<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::name('dokumentasi')
    ->prefix('dokumentasi')
    ->group(function () {
        Route::get('/', function (Request $request) {
            $content = !($request->get('content')) ? 'dashboard' : $request->get('content');
            return view('panel.dokumentasi.index', [
                'title' => breadcrumbAttribute()[12],
                'content' => $content
            ]);
        });
    });
