<?php

namespace App\Repositories\Backoffice\Notifikasi;

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

use App\Repositories\Backoffice\Notifikasi\NotifikasiRepositories;

class EloquentNotifikasiRepositories implements NotifikasiRepositories
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
     * get current notifikasi
     */
    public function current()
    {
        try {
            $data = [
                [
                    'title' => 'notifikasi laporan',
                    'description' => 'description notifikasi laporan',
                    'time' => '3 menit lalu',
                    'module' => 'laporan',
                    'link' => '/laporan/ringkasan-laporan'
                ],
                [
                    'title' => 'notifikasi riwayat transaksi',
                    'description' => 'description notifikasi riwayat transaksi',
                    'time' => '3 menit lalu',
                    'module' => 'riwayat transaksi',
                    'link' => '/riwayat-transaksi'
                ],
                [
                    'title' => 'notifikasi pembayaran',
                    'description' => 'description notifikasi pembayaran',
                    'time' => '3 menit lalu',
                    'module' => 'pembayaran',
                    'link' => '/pembayaran/invoice'
                ],
                [
                    'title' => 'notifikasi produk',
                    'description' => 'description notifikasi produk',
                    'time' => '3 menit lalu',
                    'module' => 'produk',
                    'link' => '/produk/daftar-produk'
                ],
                [
                    'title' => 'notifikasi bahan dan resep',
                    'description' => 'description notifikasi bahan dan resep',
                    'time' => '3 menit lalu',
                    'module' => 'bahan dan resep',
                    'link' => '/ingredient/daftar-bahan'
                ],
                [
                    'title' => 'notifikasi inventori',
                    'description' => 'description notifikasi inventori',
                    'time' => '3 menit lalu',
                    'module' => 'inventori',
                    'link' => '/inventory/ringkasan-inventory'
                ],
                [
                    'title' => 'notifikasi pelanngan',
                    'description' => 'description notifikasi pelanngan',
                    'time' => '3 menit lalu',
                    'module' => 'pelanggan',
                    'link' => '/pelanggan'
                ],
                [
                    'title' => 'notifikasi pegawai',
                    'description' => 'description notifikasi pegawai',
                    'time' => '3 menit lalu',
                    'module' => 'pegawai',
                    'link' => '/pegawai'
                ],
                [
                    'title' => 'notifikasi outlet',
                    'description' => 'description notifikasi outlet',
                    'time' => '3 menit lalu',
                    'module' => 'outlet',
                    'link' => '/outlet/receipt'
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

    /**
     * get all record
     */
    public function data($date)
    {
        try {
            $data = [
                [
                    "date" => 'today',
                    "rows" => [
                        [
                            'title' => 'notifikasi laporan',
                            'description' => 'description notifikasi laporan',
                            'time' => '10:00',
                            'module' => 'laporan',
                            'link' => '/laporan/ringkasan-laporan'
                        ],
                        [
                            'title' => 'notifikasi riwayat transaksi',
                            'description' => 'description notifikasi riwayat transaksi',
                            'time' => '10:00',
                            'module' => 'riwayat transaksi',
                            'link' => '/riwayat-transaksi'
                        ],
                    ]
                ],
                [
                    "date" => 'yesterday',
                    "rows" => [
                        [
                            'title' => 'notifikasi pembayaran',
                            'description' => 'description notifikasi pembayaran',
                            'time' => '10:00',
                            'module' => 'pembayaran',
                            'link' => '/pembayaran/invoice'
                        ],
                        [
                            'title' => 'notifikasi produk',
                            'description' => 'description notifikasi produk',
                            'time' => '10:00',
                            'module' => 'produk',
                            'link' => '/produk/daftar-produk'
                        ]
                    ]
                ],
                [
                    "date" => '01 Juli 2024',
                    "rows" => [
                        [
                            'title' => 'notifikasi bahan dan resep',
                            'description' => 'description notifikasi bahan dan resep',
                            'time' => '10:00',
                            'module' => 'bahan dan resep',
                            'link' => '/ingredient/daftar-bahan'
                        ],
                        [
                            'title' => 'notifikasi inventori',
                            'description' => 'description notifikasi inventori',
                            'time' => '10:00',
                            'module' => 'inventori',
                            'link' => '/inventory/ringkasan-inventory'
                        ],
                        [
                            'title' => 'notifikasi pelanngan',
                            'description' => 'description notifikasi pelanngan',
                            'time' => '10:00',
                            'module' => 'pelanggan',
                            'link' => '/pelanggan'
                        ],
                        [
                            'title' => 'notifikasi pegawai',
                            'description' => 'description notifikasi pegawai',
                            'time' => '10:00',
                            'module' => 'pegawai',
                            'link' => '/pegawai'
                        ],
                        [
                            'title' => 'notifikasi outlet',
                            'description' => 'description notifikasi outlet',
                            'time' => '10:00',
                            'module' => 'outlet',
                            'link' => '/outlet/receipt'
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
