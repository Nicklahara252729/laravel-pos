<?php

namespace App\Repositories\Backoffice\Outlet\PengaturanMeja;

/**
 * import component 
 */

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\DB;

/**
 * import traits
 */

use App\Traits\Response;
use App\Traits\Message;

/**
 * helpers Collection
 */

use App\Helpers\CheckerHelpers;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Outlet\PengaturanMeja\PengaturanMejaRepositories;

class EloquentPengaturanMejaRepositories implements PengaturanMejaRepositories
{
    use Response, Message;

    private $initCheckerHelper;
    protected $path;

    public function __construct(
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;
    }

    /**
     * get data group meja
     */
    public function groupMejaData()
    {
        try {
            $data = [
                [
                    'uuid_table' => 'qwerty',
                    'grup_meja' => 'Meja 1',
                    'status' => 'active',
                    'jumlah_meja' => 3
                ],
                [
                    'uuid_table' => 'qwerty',
                    'grup_meja' => 'Meja 2',
                    'status' => 'inactive',
                    'jumlah_meja' => 4
                ],
                [
                    'uuid_table' => 'qwerty',
                    'grup_meja' => 'Meja 3',
                    'status' => 'active',
                    'jumlah_meja' => 6
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
     * get single data group meja
     */
    public function groupMejaGet($uuidTable)
    {
        try {
            $data = [
                'uuid_table' => 'qwerty',
                'grup_meja' => 'Meja 3',
                'status' => 'active',
                'jumlah_meja' => 6,
                'bentuk' => 'kotak'
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
     * save data group meja
     */
    public function groupMejaSave($request)
    {
        DB::beginTransaction();
        try {

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', 'group meja'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * update data group meja
     */
    public function groupMejaUpdate($request, $uuidOutlet)
    {
        DB::begintransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'group meja'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * duplicte data group meja
     */
    public function groupMejaDuplicate($uuidOutlet)
    {
        DB::begintransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'duplicate group meja'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * duplicte data group meja
     */
    public function groupMejaAturMeja($uuidOutlet)
    {
        DB::begintransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'atur meja group meja'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * delete data group meja
     */
    public function groupMejaDelete($uuidTable, $uuidOutlet)
    {
        DB::beginTransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', 'Grup Meja'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * get total data for laporan
     */
    public function laporanTotal()
    {
        try {
            $data = [
                'reservasi' => 31,
                'done' => 21,
                'cancel' => 9,
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
     * get data for laporan
     */
    public function laporanData()
    {
        try {
            $data = [
                [
                    'uuid_table' => 'qwe123ad',
                    'tanggal' => '2021-01-01',
                    'struk' => 'ASD123',
                    'jumlah_meja' => 2,
                    'status' => 'reservasi'
                ],
                [
                    'uuid_table' => 'qwe123ad',
                    'tanggal' => '2021-01-01',
                    'struk' => 'ASD123',
                    'jumlah_meja' => 2,
                    'status' => 'done'
                ],
                [
                    'uuid_table' => 'qwe123ad',
                    'tanggal' => '2021-01-01',
                    'struk' => 'ASD123',
                    'jumlah_meja' => 2,
                    'status' => 'cancel'
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
     * get transaksi for laporan
     */
    public function laporanTransaksi($uuidTable)
    {
        try {

            $data = [
                'uuid_invoice' => 'qwerty',
                'status' => 'reservasi',
                'no_struck' => 'JASDH123876',
                'tanggal_reservasi' => '1 April 2024, pada 18:00 WIB',
                'meja' => 'Meja 01',
                'jumlah_kursi' => 2,
                'product' => [
                    'item' => [
                        [
                            'name' => 'item 01',
                            'price' => 1000000,
                            'jumlah' => 1,
                            'variant' => [
                                [
                                    'name' => 'variant 01',
                                    'price' => 100000
                                ],
                                [
                                    'name' => 'variant 02',
                                    'price' => 200000
                                ],
                                [
                                    'name' => 'variant 03',
                                    'price' => 300000
                                ]
                            ],
                            'modifier' => [
                                [
                                    'name' => 'modifier 01',
                                    'price' => 100000
                                ],
                                [
                                    'name' => 'modifier 02',
                                    'price' => 200000
                                ],
                                [
                                    'name' => 'modifier 03',
                                    'price' => 300000
                                ]
                            ],
                            'promo' => [
                                'name' => 'Ramadan Sales',
                                'price' => 1000000
                            ],
                            'photo' => 'https://picsum.photos/100',
                        ],
                        [
                            'name' => 'item 02',
                            'price' => 1000000,
                            'jumlah' => 2,
                            'variant' => [
                                [
                                    'name' => 'variant 01',
                                    'price' => 100000
                                ],
                                [
                                    'name' => 'variant 02',
                                    'price' => 200000
                                ],
                                [
                                    'name' => 'variant 03',
                                    'price' => 300000
                                ]
                            ],
                            'modifier' => [
                                [
                                    'name' => 'modifier 01',
                                    'price' => 100000
                                ],
                                [
                                    'name' => 'modifier 02',
                                    'price' => 200000
                                ],
                                [
                                    'name' => 'modifier 03',
                                    'price' => 300000
                                ]
                            ],
                            'promo' => [
                                'name' => 'Harbolnas',
                                'price' => 1000000
                            ],
                            'photo' => 'https://picsum.photos/100',
                        ]
                    ],
                    'diskon' => 100000,
                    'subtotal' => 1100000,
                    'gratuity' => 10000,
                    'tax' => 10000,
                    'total' => 1200000,
                    'payment_method' => [
                        'method' => 'Cash',
                        'amount' => 1200000
                    ],
                    'charge' => 980000
                ],
                'reservasi' => 10000,
                'refund' => 1200000,
                'catatan' => null,
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
     * get void for laporan
     */
    public function laporanVoid($uuidOutlet)
    {
        try {
            $data = [
                'product_cancel' => 1000,
                'total_price' => 1914000,
                'rows' => [
                    [
                        'time' => '31/05/2023 - 01:49',
                        'struck' => 'ASD123S',
                        'item' => 'item 1',
                        'qty' => 1,
                        'reason' => 'sudah dingin',
                        'price' => 120000
                    ],
                    [
                        'time' => '31/05/2023 - 01:49',
                        'struck' => 'ASD123S',
                        'item' => 'item 2',
                        'qty' => 1,
                        'reason' => 'hambar',
                        'price' => 120000
                    ],
                    [
                        'time' => '31/05/2023 - 01:49',
                        'struck' => 'ASD123S',
                        'item' => 'item 3',
                        'qty' => 1,
                        'reason' => 'salah pesanan',
                        'price' => 120000
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
