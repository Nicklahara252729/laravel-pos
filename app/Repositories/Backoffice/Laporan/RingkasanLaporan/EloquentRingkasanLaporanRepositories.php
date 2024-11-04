<?php

namespace App\Repositories\Backoffice\Laporan\RingkasanLaporan;

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

use App\Repositories\Backoffice\Laporan\RingkasanLaporan\RingkasanLaporanRepositories;

class EloquentRingkasanLaporanRepositories implements RingkasanLaporanRepositories
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
                "penjualan_kotor" => 0,
                "diskon" => 0,
                "refund" => 0,
                "penjualan_bersih" => 0,
                "gratuity" => 0,
                "pajak" => 0,
                "pembulatan" => 0,
                "total_penjualan" => 0
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
