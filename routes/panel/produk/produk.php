<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\Produk\DaftarProduk\DaftarProdukController;

Route::prefix('produk')->name('produk.')->group(function () {

    /**
     * daftar produk
     */
    Route::name('daftar-produk.')->prefix('daftar-produk')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.daftar-produk.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Daftar Produk'
            ]);
        });
        Route::get('export/{uuidOutlet}', [DaftarProdukController::class, 'export'])->name('export');
    });

    /**
     * modifier
     */
    Route::name('modifier.')->prefix('modifier')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.modifier.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Modifier'
            ]);
        });
    });

    /**
     * categories
     */
    Route::name('kategori-produk.')->prefix('kategori-produk')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.kategori-produk.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Kategori Produk'
            ]);
        });
    });

    /**
     * bundle package
     */
    Route::name('paket-bundle.')->prefix('paket-bundle')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.paket-bundle.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Paket Bundle'
            ]);
        });
    });

    /**
     * promo
     */
    Route::name('promo-produk.')->prefix('promo-produk')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.promo-produk.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Promo Produk'
            ]);
        });
    });

    /**
     * Produk discount
     */
    Route::name('diskon-produk.')->prefix('diskon-produk')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.diskon-produk.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Diskon Produk'
            ]);
        });
    });

    /**
     * Produk taxes
     */
    Route::name('pajak-produk.')->prefix('pajak-produk')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.pajak-produk.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Pajak Produk'
            ]);
        });
    });

    /**
     * Produk gratuity
     */
    Route::name('gratuity.')->prefix('gratuity')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.gratuity.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Gratuity'
            ]);
        });
    });

    /**
     * sales type
     */
    Route::name('tipe-penjualan.')->prefix('tipe-penjualan')->group(function () {
        Route::get('/', function () {
            return view('panel.produk.tipe-penjualan.index', [
                'title' => breadcrumbAttribute()[4],
                'subTitle' => 'Tipe Penjualan'
            ]);
        });
    });
});
