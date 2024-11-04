<?php

namespace App\Repositories\Backoffice\Laporan\ModifierSales;

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

use App\Repositories\Backoffice\Laporan\ModifierSales\ModifierSalesRepositories;

class EloquentModifierSalesRepositories implements ModifierSalesRepositories
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
     * get data modifier sales
     */
    public function data()
    {
        try {
            $data = [
                'total' => [
                    'jumlah_terjual' => 0,
                    'penjualan_kotor' => 0,
                    'diskon' => 0,
                    'pengembalian' => 0,
                    'penjualan_bersih' => 0,
                ],
                'list' => [
                    'Chapster' => [
                        'total' => [
                            'jumlah_terjual' => 0,
                            'penjualan_kotor' => 0,
                            'diskon' => 0,
                            'pengembalian' => 0,
                            'penjualan_bersih' => 0,
                        ],
                        'list' => [
                            [
                                'nama' => 'Deni',
                                'jumlah_terjual' => 0,
                                'penjualan_kotor' => 0,
                                'diskon' => 0,
                                'pengembalian' => 0,
                                'penjualan_bersih' => 0,
                            ],
                            [
                                'nama' => 'Herman',
                                'jumlah_terjual' => 0,
                                'penjualan_kotor' => 0,
                                'diskon' => 0,
                                'pengembalian' => 0,
                                'penjualan_bersih' => 0,
                            ],
                            [
                                'nama' => 'Nando',
                                'jumlah_terjual' => 0,
                                'penjualan_kotor' => 0,
                                'diskon' => 0,
                                'pengembalian' => 0,
                                'penjualan_bersih' => 0,
                            ]
                        ]
                    ],
                    'Kasir' => [
                        'total' => [
                            'jumlah_terjual' => 0,
                            'penjualan_kotor' => 0,
                            'diskon' => 0,
                            'pengembalian' => 0,
                            'penjualan_bersih' => 0,
                        ],
                        'list' => [
                            [
                                'nama' => 'Dwi',
                                'jumlah_terjual' => 0,
                                'penjualan_kotor' => 0,
                                'diskon' => 0,
                                'pengembalian' => 0,
                                'penjualan_bersih' => 0,
                            ]
                        ]
                    ],
                    'Konsumen' => [
                        'total' => [
                            'jumlah_terjual' => 0,
                            'penjualan_kotor' => 0,
                            'diskon' => 0,
                            'pengembalian' => 0,
                            'penjualan_bersih' => 0,
                        ],
                        'list' => [
                            [
                                'nama' => 'Bule',
                                'jumlah_terjual' => 0,
                                'penjualan_kotor' => 0,
                                'diskon' => 0,
                                'pengembalian' => 0,
                                'penjualan_bersih' => 0,
                            ],
                            [
                                'nama' => 'Lokal',
                                'jumlah_terjual' => 0,
                                'penjualan_kotor' => 0,
                                'diskon' => 0,
                                'pengembalian' => 0,
                                'penjualan_bersih' => 0,
                            ]
                        ]
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
