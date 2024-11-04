<?php

namespace App\Repositories\Backoffice\Laporan\PenjualanKategori;

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
 * repositories collection
 */

use App\Repositories\Backoffice\Laporan\PenjualanKategori\PenjualanKategoriRepositories;

class EloquentPenjualanKategoriRepositories implements PenjualanKategoriRepositories
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
     * get data ringkasan laporan
     */
    public function data($date)
    {
        try {
            $data = [
                'total' => [
                    'produk' => [
                        'terjual' => 0,
                        'dikembalikan' => 0
                    ],
                    'nominal' => [
                        'penjualan_kotor' => 0,
                        'diskon' => 0,
                        'dikembalikan' => 0,
                        'net' => 0,
                        'cogs' => 0
                    ]
                ],
                'list' => [
                    [
                        'kategori' => 'Makanan',
                        'terjual' => 0,
                        'produk' => [
                            'terjual' => 0,
                            'dikembalikan' => 0
                        ],
                        'nominal' => [
                            'penjualan_kotor' => 0,
                            'diskon' => 0,
                            'dikembalikan' => 0,
                            'net' => 0,
                            'cogs' => 0
                        ]
                    ],
                    [
                        'kategori' => 'Minuman',
                        'produk' => [
                            'terjual' => 0,
                            'dikembalikan' => 0
                        ],
                        'nominal' => [
                            'penjualan_kotor' => 0,
                            'diskon' => 0,
                            'dikembalikan' => 0,
                            'net' => 0,
                            'cogs' => 0
                        ]
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
