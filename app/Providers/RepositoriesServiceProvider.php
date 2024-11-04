<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->backofficeDashboardRepositories();
        $this->backofficeNotifikasiRepositories();
        $this->backofficeGeneralSettingsRepositories();
        $this->backofficeIngredientRepositories();
        $this->backofficeInventoryRepositories();
        $this->backofficeLaporanRepositories();
        $this->backofficeOutletRepositories();
        $this->backofficePegawaiRepositories();
        $this->backofficePelangganRepositories();
        $this->backofficePembayaranRepositories();
        $this->backofficeProdukRepositories();
        $this->backofficeProfileRepositories();
        $this->backofficeRiwayatTransaksiRepositories();
        $this->mobileActivityRepositories();
        $this->mobilePengaturanRepositories();
        $this->mobilePosRepositories();
        $this->mobilePustakaRepositories();
        $this->mobileTableRepositories();
        $this->regionRepositories();
        $this->tokenRepositories();
        $this->authRepositories();
        $this->logRepositories();
    }

    /**
     * dashboard
     */
    public function backofficeDashboardRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Dashboard\DashboardRepositories',
            'App\Repositories\Backoffice\Dashboard\EloquentDashboardRepositories'
        );
    }

    /**
     * notifikasi
     */
    public function backofficeNotifikasiRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Notifikasi\NotifikasiRepositories',
            'App\Repositories\Backoffice\Notifikasi\EloquentNotifikasiRepositories'
        );
    }

    /**
     * general setting repositories
     */
    public function backofficeGeneralSettingsRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\GeneralSettings\GeneralSettings\GeneralSettingsRepositories',
            'App\Repositories\Backoffice\GeneralSettings\GeneralSettings\EloquentGeneralSettingsRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\GeneralSettings\GeneralSettingAssign\GeneralSettingAssignRepositories',
            'App\Repositories\Backoffice\GeneralSettings\GeneralSettingAssign\EloquentGeneralSettingAssignRepositories'
        );
    }

    /**
     * ingredient repositories
     */
    public function backofficeIngredientRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Ingredient\DaftarBahan\DaftarBahanRepositories',
            'App\Repositories\Backoffice\Ingredient\DaftarBahan\EloquentDaftarBahanRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Ingredient\KategoriBahan\KategoriBahanRepositories',
            'App\Repositories\Backoffice\Ingredient\KategoriBahan\EloquentKategoriBahanRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Ingredient\Resep\ResepRepositories',
            'App\Repositories\Backoffice\Ingredient\Resep\EloquentResepRepositories'
        );
    }

    /**
     * inventory repositories
     */
    public function backofficeInventoryRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Inventory\PurchasingOrder\PurchasingOrderRepositories',
            'App\Repositories\Backoffice\Inventory\PurchasingOrder\EloquentPurchasingOrderRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Inventory\RingkasanInventory\RingkasanInventoryRepositories',
            'App\Repositories\Backoffice\Inventory\RingkasanInventory\EloquentRingkasanInventoryRepositories'
        );
    }

    /**
     * laporan repositories
     */
    public function backofficeLaporanRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\CollectedBy\CollectedByRepositories',
            'App\Repositories\Backoffice\Laporan\CollectedBy\EloquentCollectedByRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\Diskon\DiskonRepositories',
            'App\Repositories\Backoffice\Laporan\Diskon\EloquentDiskonRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\Gratifikasi\GratifikasiRepositories',
            'App\Repositories\Backoffice\Laporan\Gratifikasi\EloquentGratifikasiRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\KeuntunganKotor\KeuntunganKotorRepositories',
            'App\Repositories\Backoffice\Laporan\KeuntunganKotor\EloquentKeuntunganKotorRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\MetodePembayaran\MetodePembayaranRepositories',
            'App\Repositories\Backoffice\Laporan\MetodePembayaran\EloquentMetodePembayaranRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\ModifierSales\ModifierSalesRepositories',
            'App\Repositories\Backoffice\Laporan\ModifierSales\EloquentModifierSalesRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\Pajak\PajakRepositories',
            'App\Repositories\Backoffice\Laporan\Pajak\EloquentPajakRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\PenjualanKategori\PenjualanKategoriRepositories',
            'App\Repositories\Backoffice\Laporan\PenjualanKategori\EloquentPenjualanKategoriRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\PenjualanProduk\PenjualanProdukRepositories',
            'App\Repositories\Backoffice\Laporan\PenjualanProduk\EloquentPenjualanProdukRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\RingkasanLaporan\RingkasanLaporanRepositories',
            'App\Repositories\Backoffice\Laporan\RingkasanLaporan\EloquentRingkasanLaporanRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\Shift\ShiftRepositories',
            'App\Repositories\Backoffice\Laporan\Shift\EloquentShiftRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Laporan\TipePenjualan\TipePenjualanRepositories',
            'App\Repositories\Backoffice\Laporan\TipePenjualan\EloquentTipePenjualanRepositories'
        );
    }

    /**
     * outlet repositories
     */
    public function backofficeOutletRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Outlet\PengaturanMeja\PengaturanMejaRepositories',
            'App\Repositories\Backoffice\Outlet\PengaturanMeja\EloquentPengaturanMejaRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Outlet\Receipt\ReceiptRepositories',
            'App\Repositories\Backoffice\Outlet\Receipt\EloquentReceiptRepositories'
        );
    }

    /**
     * pegawai repositories
     */
    public function backofficePegawaiRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Pegawai\Akses\AksesRepositories',
            'App\Repositories\Backoffice\Pegawai\Akses\EloquentAksesRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Pegawai\DaftarPegawai\DaftarPegawaiRepositories',
            'App\Repositories\Backoffice\Pegawai\DaftarPegawai\EloquentDaftarPegawaiRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Pegawai\PinAkses\PinAksesRepositories',
            'App\Repositories\Backoffice\Pegawai\PinAkses\EloquentPinAksesRepositories'
        );
    }

    /**
     * pelanggan repositories
     */
    public function backofficePelangganRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Pelanggan\PelangganRepositories',
            'App\Repositories\Backoffice\Pelanggan\EloquentPelangganRepositories'
        );
    }

    /**
     * pembayaran repositories
     */
    public function backofficePembayaranRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Pembayaran\CheckoutSetting\CheckoutSettingRepositories',
            'App\Repositories\Backoffice\Pembayaran\CheckoutSetting\EloquentCheckoutSettingRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Pembayaran\MetodePembayaran\MetodePembayaranRepositories',
            'App\Repositories\Backoffice\Pembayaran\MetodePembayaran\EloquentMetodePembayaranRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Pembayaran\Invoice\InvoiceRepositories',
            'App\Repositories\Backoffice\Pembayaran\Invoice\EloquentInvoiceRepositories'
        );
    }

    /**
     * produk repositories
     */
    public function backofficeProdukRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Produk\DaftarProduk\DaftarProdukRepositories',
            'App\Repositories\Backoffice\Produk\DaftarProduk\EloquentDaftarProdukRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Produk\Gratuity\GratuityRepositories',
            'App\Repositories\Backoffice\Produk\Gratuity\EloquentGratuityRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Produk\KategoriProduk\KategoriProdukRepositories',
            'App\Repositories\Backoffice\Produk\KategoriProduk\EloquentKategoriProdukRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Produk\Modifier\Modifier\ModifierRepositories',
            'App\Repositories\Backoffice\Produk\Modifier\Modifier\EloquentModifierRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Produk\Modifier\ModifierItem\ModifierItemRepositories',
            'App\Repositories\Backoffice\Produk\Modifier\ModifierItem\EloquentModifierItemRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Produk\Modifier\ModifierIngredient\ModifierIngredientRepositories',
            'App\Repositories\Backoffice\Produk\Modifier\ModifierIngredient\EloquentModifierIngredientRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Produk\PajakProduk\PajakProdukRepositories',
            'App\Repositories\Backoffice\Produk\PajakProduk\EloquentPajakProdukRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Produk\PaketBundle\PaketBundleRepositories',
            'App\Repositories\Backoffice\Produk\PaketBundle\EloquentPaketBundleRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Produk\PromoProduk\PromoProdukRepositories',
            'App\Repositories\Backoffice\Produk\PromoProduk\EloquentPromoProdukRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Produk\TipePenjualan\TipePenjualanRepositories',
            'App\Repositories\Backoffice\Produk\TipePenjualan\EloquentTipePenjualanRepositories'
        );

        $this->app->bind(
            'App\Repositories\Backoffice\Produk\DiskonProduk\DiskonProdukRepositories',
            'App\Repositories\Backoffice\Produk\DiskonProduk\EloquentDiskonProdukRepositories'
        );
    }

    /**
     * profile repositories
     */
    public function backofficeProfileRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\Profile\DaftarOutlet\DaftarOutletRepositories',
            'App\Repositories\Backoffice\Profile\DaftarOutlet\EloquentDaftarOutletRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Profile\Akun\AkunRepositories',
            'App\Repositories\Backoffice\Profile\Akun\EloquentAkunRepositories'
        );
        $this->app->bind(
            'App\Repositories\Backoffice\Profile\Pengaturan\PengaturanRepositories',
            'App\Repositories\Backoffice\Profile\Pengaturan\EloquentPengaturanRepositories'
        );
    }

    /**
     * riwayat transaksi repositories
     */
    public function backofficeRiwayatTransaksiRepositories()
    {
        $this->app->bind(
            'App\Repositories\Backoffice\RiwayatTransaksi\RiwayatTransaksiRepositories',
            'App\Repositories\Backoffice\RiwayatTransaksi\EloquentRiwayatTransaksiRepositories'
        );
    }

    /**
     * activity repositories
     */
    public function mobileActivityRepositories()
    {
        $this->app->bind(
            'App\Repositories\Mobile\Activity\ActivityRepositories',
            'App\Repositories\Mobile\Activity\EloquentActivityRepositories'
        );
    }

    /**
     * pengaturan repositories
     */
    public function mobilePengaturanRepositories()
    {
        $this->app->bind(
            'App\Repositories\Mobile\Pengaturan\PengaturanRepositories',
            'App\Repositories\Mobile\Pengaturan\EloquentPengaturanRepositories'
        );
    }

    /**
     * pos repositories
     */
    public function mobilePosRepositories()
    {
        $this->app->bind(
            'App\Repositories\Mobile\Pos\PosRepositories',
            'App\Repositories\Mobile\Pos\EloquentPosRepositories'
        );
    }

    /**
     * pustaka repositories
     */
    public function mobilePustakaRepositories()
    {
        $this->app->bind(
            'App\Repositories\Token\PustakaRepositories',
            'App\Repositories\Token\EloquentPustakaRepositories'
        );
    }

    /**
     * table repositories
     */
    public function mobileTableRepositories()
    {
        $this->app->bind(
            'App\Repositories\Mobile\Table\TableRepositories',
            'App\Repositories\Mobile\Table\EloquentTableRepositories'
        );
    }

    /**
     * table repositories
     */
    public function regionRepositories()
    {
        $this->app->bind(
            'App\Repositories\Region\Provinsi\ProvinsiRepositories',
            'App\Repositories\Region\Provinsi\EloquentProvinsiRepositories'
        );
        $this->app->bind(
            'App\Repositories\Region\Kota\KotaRepositories',
            'App\Repositories\Region\Kota\EloquentKotaRepositories'
        );
        $this->app->bind(
            'App\Repositories\Region\Kecamatan\KecamatanRepositories',
            'App\Repositories\Region\Kecamatan\EloquentKecamatanRepositories'
        );
        $this->app->bind(
            'App\Repositories\Region\Desa\DesaRepositories',
            'App\Repositories\Region\Desa\EloquentDesaRepositories'
        );
    }

    /**
     * token repositories
     */
    public function tokenRepositories()
    {
        $this->app->bind(
            'App\Repositories\Token\TokenRepositories',
            'App\Repositories\Token\EloquentTokenRepositories'
        );
    }

    /**
     * auth repositories
     */
    public function authRepositories()
    {
        $this->app->bind(
            'App\Repositories\Auth\Login\LoginRepositories',
            'App\Repositories\Auth\Login\EloquentLoginRepositories'
        );
        $this->app->bind(
            'App\Repositories\Auth\Logout\LogoutRepositories',
            'App\Repositories\Auth\Logout\EloquentLogoutRepositories'
        );
    }

    /**
     * dashboard
     */
    public function logRepositories()
    {
        $this->app->bind(
            'App\Repositories\Log\LogRepositories',
            'App\Repositories\Log\EloquentLogRepositories'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

    }
}
