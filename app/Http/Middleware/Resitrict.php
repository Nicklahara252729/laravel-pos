<?php

namespace App\Http\Middleware;

/**
 * import component
 */

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * import model
 */

use App\Models\User\Access\Access;

/**
 * import trait
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

class Resitrict
{
    use Message, Response;

    private $checkerHelpers;
    private $access;

    public function __construct(
        Access $access,
        CheckerHelpers $checkerHelpers
    ) {

        /**
         * initialize helper
         */
        $this->checkerHelpers = $checkerHelpers;

        /**
         * initialize model
         */
        $this->access = $access;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $level = authAttribute()['level'];

        /**
         * check backoffice and mobile permission
         */
        $platform = globalAttribute()['uriSegment2'] == 'backoffice' ? 'backoffice_permission' : 'app_permission';
        $getAccess = $this->checkerHelpers->accessChecker(['uuid_access' => authAttribute()['uuidAccess'], $platform => 'yes']);
        if ($level == 'employee' && is_null($getAccess)) :
            $response = $this->sendResponse($this->outputMessage('forbidden'), 403);
            $code = $response['code'];
            unset($response['code']);
            return response($response, $code);
        endif;

        /**
         * check parent menu permission
         */
        $uriSegment3 = str_replace('-', '_', globalAttribute()['uriSegment3']);
        $menu = $this->menu($uriSegment3);
        if ($uriSegment3 != 'profile') :
            $getAccess = $this->checkerHelpers->accessChecker(['uuid_access' => authAttribute()['uuidAccess'], $menu => 'yes']);
            $parent = ['laporan', 'pembayaran', 'produk', 'outlet', 'inventori', 'bahan_dan_resep', 'pegawai'];
            if (
                ($level == 'employee' && in_array($uriSegment3, $parent) && is_null($getAccess)) ||
                ($level == 'employee' && is_null($getAccess))
            ) :
                $response = $this->sendResponse($this->outputMessage('forbidden'), 403);
                $code = $response['code'];
                unset($response['code']);
                return response($response, $code);
            endif;
        endif;

        /**
         * check submenu permission
         */
        if (isset(globalAttribute()['uriSegment5'])) :
            $uriSegment4 = str_replace('-', '_', globalAttribute()['uriSegment4']);
            if ($uriSegment4 != 'assign') :
                $method = ['get','transaksi','item'];
                $uriCheckMethod = in_array($uriSegment4, $method) == 1 ? $uriSegment3 : $uriSegment4;
                $menu = $this->menu($uriCheckMethod);
                $getAccess = $this->checkerHelpers->accessChecker(['uuid_access' => authAttribute()['uuidAccess'], $menu => 'yes']);
                if ($level == 'employee' && is_null($getAccess)) :
                    $response = $this->sendResponse($this->outputMessage('forbidden'), 403);
                    $code = $response['code'];
                    unset($response['code']);
                    return response($response, $code);
                endif;
            endif;
        endif;

        return $next($request);
    }

    private function menu(string $menu)
    {
        $key  = "menu";
        $data = [
            [
                'menu' => 'general_settings',
                'akses' => 'pengaturan_umum'
            ],
            [
                'menu' => 'ingredient',
                'akses' => 'bahan_dan_resep'
            ],
            [
                'menu' => 'akses',
                'akses' => 'hak_akses'
            ],
            [
                'menu' => 'laporan',
                'akses' => 'laporan_penjualan'
            ],
            [
                'menu' => 'inventory',
                'akses' => 'inventori'
            ],
            [
                'menu' => 'ringkasan_inventory',
                'akses' => 'ringkasan_inventori'
            ],
            [
                'menu' => 'purchasing_order',
                'akses' => 'purchase_order'
            ],
            [
                'menu' => 'pin_akses',
                'akses' => 'hak_akses'
            ],
        ];

        $filteredArray = array_filter($data, function ($item) use ($key, $menu) {
            return $item[$key] === $menu;
        });

        $akses = isset(array_values($filteredArray)[0]['akses']) ? array_values($filteredArray)[0]['akses'] : $menu;

        return $akses;
    }
}
