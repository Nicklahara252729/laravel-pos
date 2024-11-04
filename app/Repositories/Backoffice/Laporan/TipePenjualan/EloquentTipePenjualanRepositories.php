<?php

namespace App\Repositories\Backoffice\Laporan\TipePenjualan;

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

use App\Repositories\Backoffice\Laporan\TipePenjualan\TipePenjualanRepositories;

class EloquentTipePenjualanRepositories implements TipePenjualanRepositories
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
                    'kuantitas' => 0,
                    'jumlah' => 0
                ],
                'list' => [
                    [
                        'tipe_penjualan' => 'Dine In',
                        'kuantitas' => 0,
                        'jumlah' => 0
                    ],
                    [
                        'tipe_penjualan' => 'Take Away',
                        'kuantitas' => 0,
                        'jumlah' => 0
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
