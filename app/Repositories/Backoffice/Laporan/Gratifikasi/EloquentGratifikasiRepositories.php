<?php

namespace App\Repositories\Backoffice\Laporan\Gratifikasi;

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

use App\Repositories\Backoffice\Laporan\Gratifikasi\GratifikasiRepositories;

class EloquentGratifikasiRepositories implements GratifikasiRepositories
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
                'total' => 0,
                'list' => [
                    [
                        'nama' => 'Pajak',
                        'tax_rate' => 0,
                        'amount' => 0,
                        'collected' => 0
                    ],
                    [
                        'nama' => 'Service',
                        'tax_rate' => 0,
                        'amount' => 0,
                        'collected' => 0
                    ],
                    [
                        'nama' => 'Tax',
                        'tax_rate' => 0,
                        'amount' => 0,
                        'collected' => 0
                    ],
                    [
                        'nama' => 'PPn',
                        'tax_rate' => 0,
                        'amount' => 0,
                        'collected' => 0
                    ],
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
