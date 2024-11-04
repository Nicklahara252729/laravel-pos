<?php

namespace App\Repositories\Backoffice\Laporan\Diskon;

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

use App\Repositories\Backoffice\Laporan\Diskon\DiskonRepositories;

class EloquentDiskonRepositories implements DiskonRepositories
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
                'total' => [
                    'besar_diskon' => 0,
                    'jumlah' => 0,
                    'diskon_kotor' => 0,
                    'diskon_refund' => 0,
                    'diskon_bersih' => 0
                ],
                'list' => [
                    [
                        'nama' => 'Luxury black mask 1',
                        'besar_diskon' => 0,
                        'jumlah' => 0,
                        'diskon_kotor' => 0,
                        'diskon_refund' => 0,
                        'diskon_bersih' => 0
                    ],
                    [
                        'nama' => 'Luxury black mask 2',
                        'besar_diskon' => 0,
                        'jumlah' => 0,
                        'diskon_kotor' => 0,
                        'diskon_refund' => 0,
                        'diskon_bersih' => 0
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
