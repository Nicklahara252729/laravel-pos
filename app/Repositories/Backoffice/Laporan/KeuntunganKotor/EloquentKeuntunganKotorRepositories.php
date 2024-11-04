<?php

namespace App\Repositories\Backoffice\Laporan\KeuntunganKotor;

/**
 * import component 
 */

use App\Exceptions\CustomException;

/**
 * import models
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

use App\Repositories\Backoffice\Laporan\KeuntunganKotor\KeuntunganKotorRepositories;

class EloquentKeuntunganKotorRepositories implements KeuntunganKotorRepositories
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
     * get data keuntungan kotor
     */
    public function data($date)
    {
        try {
            $data = [
                "penjualan_kotor" => 0,
                "diskon" => 0,
                "refund" => 0,
                "penjualan_bersih" => 0,
                "penjualan_bersih_persen" => 0,
                "hpp" => 0,
                "hpp_persen" => 0,
                "keuntungan_kotor" => 0
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
