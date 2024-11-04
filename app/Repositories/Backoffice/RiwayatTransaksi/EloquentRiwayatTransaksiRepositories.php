<?php

namespace App\Repositories\Backoffice\RiwayatTransaksi;

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
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\RiwayatTransaksi\RiwayatTransaksiRepositories;
use App\Repositories\Backoffice\Outlet\Receipt\EloquentReceiptRepositories;

class EloquentRiwayatTransaksiRepositories implements RiwayatTransaksiRepositories
{

    use Response, Message;

    private $initCheckerHelper;
    private $eloquentReceiptRepositories;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        EloquentReceiptRepositories $eloquentReceiptRepositories
    ) {
        /**
         * initialize helper
         */
        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize repositories
         */
        $this->eloquentReceiptRepositories = $eloquentReceiptRepositories;
    }

    /**
     * get data total riwayat transaksi
     */
    public function total($date)
    {
        try {
            $data = [
                'transaksi' => 0,
                'total_pendapatan' => 0,
                'penjualan_bersih' => 0,
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
     * get data riwayat tranaksi
     */
    public function data($date, $search)
    {
        try {
            $data = [
                [
                    "date" => "Senin, 17 Januari 2023",
                    "total" => 100000,
                    "rows" => [
                        [
                            "transaction_uuid" => "1c87d0e2-5967-4e2c-a2d6-4f0b8e15c32d",
                            "outlet" => "Leven barber",
                            "time" => "10:10",
                            "employee" => "Ridho setiwan",
                            "product" => "Bread Shave",
                            "price" => 124000
                        ],
                        [
                            "transaction_uuid" => "5adfa6e9-7a56-4f26-ba7d-78ac6dd393f4",
                            "outlet" => "Leven barber",
                            "time" => "14:30",
                            "employee" => "Ridho setiwan",
                            "product" => "Bread Haircut",
                            "price" => 124000
                        ],
                        [
                            "transaction_uuid" => "c8d8a166-ae5e-42e7-bc0c-cc4eef4bbbf9",
                            "outlet" => "Leven barber",
                            "time" => "18:45",
                            "employee" => "Ridho setiwan",
                            "product" => "Bread Shave and Haircut",
                            "price" => 124000
                        ],
                        [
                            "transaction_uuid" => "f583e73b-bb42-4c2d-a6fc-2316de5a76d7",
                            "outlet" => "Leven barber",
                            "time" => "22:20",
                            "employee" => "Ridho setiwan",
                            "product" => "Bread Trim",
                            "price" => 124000
                        ]
                    ]
                ],
                [
                    "date" => "Senin, 17 Januari 2023",
                    "total" => 100000,
                    "rows" => [
                        [
                            "transaction_uuid" => "1c87d0e2-5967-4e2c-a2d6-4f0b8e15c32d",
                            "outlet" => "Leven barber",
                            "time" => "10:10",
                            "employee" => "Ridho setiwan",
                            "product" => "Bread Shave",
                            "price" => 124000
                        ],
                        [
                            "transaction_uuid" => "5adfa6e9-7a56-4f26-ba7d-78ac6dd393f4",
                            "outlet" => "Leven barber",
                            "time" => "14:30",
                            "employee" => "Ridho setiwan",
                            "product" => "Bread Haircut",
                            "price" => 124000
                        ],
                        [
                            "transaction_uuid" => "c8d8a166-ae5e-42e7-bc0c-cc4eef4bbbf9",
                            "outlet" => "Leven barber",
                            "time" => "18:45",
                            "employee" => "Ridho setiwan",
                            "product" => "Bread Shave and Haircut",
                            "price" => 124000
                        ],
                        [
                            "transaction_uuid" => "f583e73b-bb42-4c2d-a6fc-2316de5a76d7",
                            "outlet" => "Leven barber",
                            "time" => "22:20",
                            "employee" => "Ridho setiwan",
                            "product" => "Bread Trim",
                            "price" => 124000
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

    /**
     * perview receipt
     */
    public function get($uuidTransaksi, $uuidOutlet)
    {
        try {
            $data = $this->eloquentReceiptRepositories->queryPreview($uuidOutlet, $uuidTransaksi);
            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * resend receipt
     */
    public function resendReceipt($request)
    {
        DB::beginTransaction();
        try {

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', 'resend receipt'), 200, null);
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
     * issue refund
     */
    public function issueRefund($request)
    {
        DB::beginTransaction();
        try {

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', 'issue refund'), 200, null);
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
     * listing item
     */
    public function item($uuidTransaksi, $uuidOutlet)
    {
        try {
            $data = [
                [
                    'photo' => 'https://picsum.photos/100',
                    'product_name' => 'Produk item 1',
                    'varian' => 'varian 1',
                    'harga' => 100000,
                    'jumlah' => 1
                ],
                [
                    'photo' => 'https://picsum.photos/100',
                    'product_name' => 'Produk item 2',
                    'varian' => 'varian 2',
                    'harga' => 200000,
                    'jumlah' => 2
                ]
            ];
            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
