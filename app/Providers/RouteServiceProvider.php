<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = 'dashboard';

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespaceApi = 'App\Http\Controllers\Api';
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            /**
             * default
             */
            Route::middleware('web')
                ->group(base_path('routes/web.php'));


            /**
             * auth, token, region
             */
            Route::group([
                'prefix' => 'api',
                'namespace' => $this->namespaceApi,
            ], function ($router) {
                require base_path('routes/api/auth/auth.php');
                require base_path('routes/api/token/token.php');
                require base_path('routes/api/region/region.php');
            });

            /**
             * dashboard, notifikasi
             */
            Route::group([
                'middleware' => ['auth:api'],
                'prefix' => 'api/backoffice',
                'name' => 'api.backoffice',
                'namespace' => $this->namespaceApi,
            ], function ($router) {
                require base_path('routes/api/backoffice/dashboard/dashboard.php');
                require base_path('routes/api/backoffice/notifikasi/notifikasi.php');
                require base_path('routes/api/backoffice/profile/profile.php');
            });

            /**
             * backoffice
             */
            Route::group([
                'middleware' => ['auth:api', 'outlet', 'resitrict'],
                'prefix' => 'api/backoffice',
                'name' => 'api.backoffice',
                'namespace' => $this->namespaceApi . '\Backoffice',
            ], function ($router) {
                require base_path('routes/api/backoffice/general-settings/general-settings.php');
                require base_path('routes/api/backoffice/ingredient/ingredient.php');
                require base_path('routes/api/backoffice/inventory/inventory.php');
                require base_path('routes/api/backoffice/outlet/outlet.php');
                require base_path('routes/api/backoffice/pegawai/pegawai.php');
                require base_path('routes/api/backoffice/pelanggan/pelanggan.php');
                require base_path('routes/api/backoffice/pembayaran/pembayaran.php');
                require base_path('routes/api/backoffice/laporan/laporan.php');
                require base_path('routes/api/backoffice/riwayat-transaksi/riwayat-transaksi.php');
            });
            
            /**
             * backoffice produk
             */
            Route::group([
                'middleware' => ['auth:api', 'outlet', 'resitrict'],
                'prefix' => 'api/backoffice/produk',
                'name' => 'api.backoffice.produk',
                'namespace' => $this->namespaceApi . '\Backoffice',
            ], function ($router) {
                require base_path('routes/api/backoffice/produk/daftar-produk.php');
                require base_path('routes/api/backoffice/produk/gratuity.php');
                require base_path('routes/api/backoffice/produk/kategori-produk.php');
                require base_path('routes/api/backoffice/produk/modifier.php');
                require base_path('routes/api/backoffice/produk/pajak-produk.php');
                require base_path('routes/api/backoffice/produk/paket-bundle.php');
                require base_path('routes/api/backoffice/produk/promo-produk.php');
                require base_path('routes/api/backoffice/produk/tipe-penjualan.php');
                require base_path('routes/api/backoffice/produk/diskon-produk.php');
            });

            /**
             * mobile
             */
            Route::group([
                'middleware' => ['auth:api', 'outlet', 'resitrict'],
                'prefix' => 'api/mobile',
                'name' => 'api.mobile',
                'namespace' => $this->namespaceApi . 'Mobile',
            ], function ($router) {
                require base_path('routes/api/mobile/activity/activity.php');
                require base_path('routes/api/mobile/pengaturan/pengaturan.php');
                require base_path('routes/api/mobile/pos/pos.php');
                require base_path('routes/api/mobile/pustaka/pustaka.php');
                require base_path('routes/api/mobile/table/table.php');
            });

            /**
             * panel
             */
            Route::group([
                'middleware' => ['auth:web', 'web'],
                'namespace' => $this->namespace,
            ], function ($router) {
                require base_path('routes/panel/dashboard/dashboard.php');
                require base_path('routes/panel/dokumentasi/dokumentasi.php');
                require base_path('routes/panel/notifikasi/notifikasi.php');
                require base_path('routes/panel/ingredient/ingredient.php');
                require base_path('routes/panel/inventory/inventory.php');
                require base_path('routes/panel/laporan/laporan.php');
                require base_path('routes/panel/outlet/outlet.php');
                require base_path('routes/panel/pegawai/pegawai.php');
                require base_path('routes/panel/pelanggan/pelanggan.php');
                require base_path('routes/panel/pembayaran/pembayaran.php');
                require base_path('routes/panel/produk/produk.php');
                require base_path('routes/panel/profile/profile.php');
                require base_path('routes/panel/riwayat-transaksi/riwayat-transaksi.php');
            });
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
