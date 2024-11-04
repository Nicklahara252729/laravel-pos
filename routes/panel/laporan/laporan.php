<?php

use Illuminate\Support\Facades\Route;

/**
 * import controller
 */
use App\Http\Controllers\Api\Backoffice\Laporan\RingkasanLaporan\RingkasanLaporanController;
use App\Http\Controllers\Api\Backoffice\Laporan\KeuntunganKotor\KeuntunganKotorController;
use App\Http\Controllers\Api\Backoffice\Laporan\MetodePembayaran\MetodePembayaranController;
use App\Http\Controllers\Api\Backoffice\Laporan\TipePenjualan\TipePenjualanController;
use App\Http\Controllers\Api\Backoffice\Laporan\PenjualanKategori\PenjualanKategoriController;
use App\Http\Controllers\Api\Backoffice\Laporan\ModifierSales\ModifierSalesController;
use App\Http\Controllers\Api\Backoffice\Laporan\Diskon\DiskonController;
use App\Http\Controllers\Api\Backoffice\Laporan\Pajak\PajakController;
use App\Http\Controllers\Api\Backoffice\Laporan\Gratifikasi\GratifikasiController;
use App\Http\Controllers\Api\Backoffice\Laporan\CollectedBy\CollectedByController;
use App\Http\Controllers\Api\Backoffice\Laporan\Shift\ShiftController;
use App\Http\Controllers\Api\Backoffice\Laporan\PenjualanProduk\PenjualanProdukController;

Route::prefix('laporan')->name('laporan.')->group(function () {

    /**
     * ringkasan laporan
     */
    Route::name('ringkasan-laporan.')->prefix('ringkasan-laporan')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.ringkasan-laporan.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Ringkasan Laporan'
            ]);
        });
        Route::get('export/{uuidOutlet}', [RingkasanLaporanController::class, 'export'])->name('export');
    });

    /**
     * keuntungan kotor
     */
    Route::name('keuntungan-kotor.')->prefix('keuntungan-kotor')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.keuntungan-kotor.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Keuntungan Kotor'
            ]);
        });
        Route::get('export/{uuidOutlet}', [KeuntunganKotorController::class, 'export'])->name('export');
    });

    /**
     * metode pembayaran
     */
    Route::name('metode-pembayaran.')->prefix('metode-pembayaran')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.metode-pembayaran.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Metode Pembayaran'
            ]);
        });
        Route::get('export/{uuidOutlet}', [MetodePembayaranController::class, 'export'])->name('export');
    });

    /**
     * tipe penjualan
     */
    Route::name('tipe-penjualan.')->prefix('tipe-penjualan')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.tipe-penjualan.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Tipe Penjualan'
            ]);
        });
        Route::get('export/{uuidOutlet}', [TipePenjualanController::class, 'export'])->name('export');
    });

    /**
     * penjualan produk
     */
    Route::name('penjualan-produk.')->prefix('penjualan-produk')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.penjualan-produk.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Penjualan Produk'
            ]);
        });
        Route::get('export/ringkasan/{uuidOutlet}', [PenjualanProdukController::class, 'exportRingkasanBarang'])->name('export.ringkasan-barang');
        Route::get('export/perjam-terjual/{uuidOutlet}', [PenjualanProdukController::class, 'exportPerjamTerjual'])->name('export.perjam-terjual');
        Route::get('export/jumlah-perjam/{uuidOutlet}', [PenjualanProdukController::class, 'exportJumlahPerjam'])->name('export.jumlah-perjam');
    });

    /**
     * penjualan kategori
     */
    Route::name('penjualan-kategori.')->prefix('penjualan-kategori')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.penjualan-kategori.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Penjualan Kategori'
            ]);
        });
        Route::get('export/{uuidOutlet}', [PenjualanKategoriController::class, 'export'])->name('export');
    });

    /**
     * modifier sales
     */
    Route::name('modifier-sales.')->prefix('modifier-sales')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.modifier-sales.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Modifier Sales'
            ]);
        });
        Route::get('export/{uuidOutlet}', [ModifierSalesController::class, 'export'])->name('export');
    });

    /**
     * diskon
     */
    Route::name('diskon.')->prefix('diskon')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.diskon.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Diskon'
            ]);
        });
        Route::get('export/{uuidOutlet}', [DiskonController::class, 'export'])->name('export');
    });

    /**
     * pajak
     */
    Route::name('pajak.')->prefix('pajak')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.pajak.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Pajak'
            ]);
        });
        Route::get('export/{uuidOutlet}', [PajakController::class, 'export'])->name('export');
    });

    /**
     * gratifikasi
     */
    Route::name('gratifikasi.')->prefix('gratifikasi')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.gratifikasi.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Gratifikasi'
            ]);
        });
        Route::get('export/{uuidOutlet}', [GratifikasiController::class, 'export'])->name('export');
    });

    /**
     * collected by
     */
    Route::name('collected-by.')->prefix('collected-by')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.collected-by.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Collected By'
            ]);
        });
        Route::get('export/{uuidOutlet}', [CollectedByController::class, 'export'])->name('export');
    });

    /**
     * shift 
     */
    Route::name('shift.')->prefix('shift')->group(function () {
        Route::get('/', function () {
            return view('panel.laporan.shift.index', [
                'title' => breadcrumbAttribute()[1],
                'subTitle' => 'Shift'
            ]);
        });
        Route::get('export/{jenisExport}/{uuidOutlet}', [ShiftController::class, 'export'])->name('export');
    });
});
