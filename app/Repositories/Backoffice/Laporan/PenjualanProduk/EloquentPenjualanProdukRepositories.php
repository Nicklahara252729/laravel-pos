<?php

namespace App\Repositories\Backoffice\Laporan\PenjualanProduk;

/**
 * import component 
 */

use App\Exceptions\CustomException;

/**
 * import traits
 */

use App\Traits\Response;
use App\Traits\Message;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Laporan\PenjualanProduk\PenjualanProdukRepositories;

class EloquentPenjualanProdukRepositories implements PenjualanProdukRepositories
{
    use Response, Message;

    private $initCheckerHelper;

    public function __construct(
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;
    }

    /**
     * get data income penjualan 
     */
    public function dataIncome($date)
    {
        try {
            $data = [
                'total' => [
                    'produk_terjual' => 0,
                    'produk_kembali' => 0,
                    'penjualan_kotor' => 0
                ],
                'list' => [
                    [
                        'nama' => 'Deni',
                        'sku' => '',
                        'kategori' => 'Kategori 1',
                        'produk_terjual' => 0,
                        'produk_kembali' => 0,
                        'penjualan_kotor' => 0
                    ],
                    [
                        'nama' => 'Herman',
                        'sku' => '',
                        'kategori' => 'Kategori 2',
                        'produk_terjual' => 0,
                        'produk_kembali' => 0,
                        'penjualan_kotor' => 0
                    ]
                ]
            ];

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * get data quantity penjualan 
     */
    public function dataQuantity($date)
    {
        try {
            $data = [
                'total' => [
                    'produk_terjual' => [
                        'alacarte' => 0,
                        'bundel' => 0
                    ],
                    'produk_kembali' => [
                        'alacarte' => 0,
                        'bundel' => 0
                    ],
                    'terjual' => 0,
                    'pengembalian' => 0
                ],
                'list' => [
                    [
                        'nama' => 'admin fee',
                        'sku' => '',
                        'kategori' => 'produk',
                        'produk_terjual' => [
                            'alacarte' => 0,
                            'bundel' => 0
                        ],
                        'produk_kembali' => [
                            'alacarte' => 0,
                            'bundel' => 0
                        ],
                        'terjual' => 0,
                        'pengembalian' => 0
                    ]
                ]
            ];

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
