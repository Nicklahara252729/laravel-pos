<?php

namespace App\Repositories\Backoffice\Laporan\CollectedBy;

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

use App\Repositories\Backoffice\Laporan\CollectedBy\CollectedByRepositories;

class EloquentCollectedByRepositories implements CollectedByRepositories
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
     * get data collected by
     */
    public function data($date)
    {
        try {
            $data = [
                'total' => [
                    'jumlah_transaksi' => 0,
                    'total_collected' => 0
                ],
                'list' => [
                    [
                        'nama' => 'Product Support Specialis',
                        'judul' => 'Owner',
                        'jumlah_transaksi' => 0,
                        'total_collected' => 0
                    ],
                    [
                        'nama' => 'Chisuy PSS',
                        'judul' => 'Employee',
                        'jumlah_transaksi' => 0,
                        'total_collected' => 0
                    ],
                    [
                        'nama' => 'Chisuy Marchisuy',
                        'judul' => 'Manager',
                        'jumlah_transaksi' => 0,
                        'total_collected' => 0
                    ],
                    [
                        'nama' => 'Ferdinan',
                        'judul' => 'Employee',
                        'jumlah_transaksi' => 0,
                        'total_collected' => 0
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
