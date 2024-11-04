<?php

namespace App\Repositories\Backoffice\Laporan\Shift;

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

use App\Repositories\Backoffice\Laporan\Shift\ShiftRepositories;

class EloquentShiftRepositories implements ShiftRepositories
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
     * get data shift laporan
     */
    public function data()
    {
        try {
            $data = [
                [
                    'nama' => 'Tasya',
                    'mulai' => '6 Juli 2023 14:41',
                    'selesai' => '6 Juli 2023 18:41',
                    'total_diharapkan' => 0,
                    'total_aktual' => 0,
                    'selisih' => 0,
                ],
                [
                    'nama' => 'Tasya',
                    'mulai' => '6 Juli 2023 14:41',
                    'selesai' => '6 Juli 2023 18:41',
                    'total_diharapkan' => 0,
                    'total_aktual' => 0,
                    'selisih' => 0,
                ],
                [
                    'nama' => 'Tasya',
                    'mulai' => '6 Juli 2023 14:41',
                    'selesai' => '6 Juli 2023 18:41',
                    'total_diharapkan' => 0,
                    'total_aktual' => 0,
                    'selisih' => 0,
                ],
                [
                    'nama' => 'Tasya',
                    'mulai' => '6 Juli 2023 14:41',
                    'selesai' => '6 Juli 2023 18:41',
                    'total_diharapkan' => 0,
                    'total_aktual' => 0,
                    'selisih' => 0,
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
