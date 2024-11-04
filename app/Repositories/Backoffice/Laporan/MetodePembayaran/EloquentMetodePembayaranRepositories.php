<?php

namespace App\Repositories\Backoffice\Laporan\MetodePembayaran;

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

use App\Repositories\Backoffice\Laporan\MetodePembayaran\MetodePembayaranRepositories;

class EloquentMetodePembayaranRepositories implements MetodePembayaranRepositories
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
    public function data()
    {
        try {
            $data = [
                'cash' => [
                    'transaksi' => 0,
                    'nominal' => 0
                ],
                'list' => [
                    'edc' => [
                        [
                            'metode_pembayaran' => 'BCA',
                            'transaksi' => 0,
                            'nominal' => 0
                        ],
                        [
                            'metode_pembayaran' => 'BRI',
                            'transaksi' => 0,
                            'nominal' => 0
                        ]
                    ],
                    'other' => [
                        [
                            'metode_pembayaran' => 'Transfer Bank',
                            'transaksi' => 0,
                            'nominal' => 0
                        ],
                        [
                            'metode_pembayaran' => 'e-Wallet',
                            'transaksi' => 0,
                            'nominal' => 0
                        ]
                    ]
                ],
                'total' => [
                    'transaksi' => 0,
                    'nominal' => 0
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
