<?php

namespace App\Repositories\Backoffice\Pembayaran\Invoice;

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

use App\Repositories\Backoffice\Pembayaran\Invoice\InvoiceRepositories;

class EloquentInvoiceRepositories implements InvoiceRepositories
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
     * get data invoice 
     */
    public function data()
    {
        try {
            $data = [
                [
                    'uuid_invoice' => 'qwerty',
                    'tanggal' => '1 Maret 2023',
                    'invoice' => '12KQWLE123',
                    'outlet' => 'Leven Medan',
                    'customer' => 'rizki setiawan',
                    'status' => ['kode' => 1, 'keterangan' => 'dibatalkan'],
                    'jumlah' => 0
                ],
                [
                    'uuid_invoice' => 'qwerty',
                    'tanggal' => '1 Maret 2023',
                    'invoice' => '12KQWLE123',
                    'outlet' => 'Leven Medan',
                    'customer' => 'rizki setiawan',
                    'status' => ['kode' => 2, 'keterangan' => 'belum dibayar'],
                    'jumlah' => 0
                ],
                [
                    'uuid_invoice' => 'qwerty',
                    'tanggal' => '1 Maret 2023',
                    'invoice' => '12KQWLE123',
                    'outlet' => 'Leven Medan',
                    'customer' => 'rizki setiawan',
                    'status' => ['kode' => 3, 'keterangan' => 'sudah dibayar'],
                    'jumlah' => 0
                ],
                [
                    'uuid_invoice' => 'qwerty',
                    'tanggal' => '1 Maret 2023',
                    'invoice' => '12KQWLE123',
                    'outlet' => 'Leven Medan',
                    'customer' => 'rizki setiawan',
                    'status' => ['kode' => 4, 'keterangan' => 'dibayar sebagian'],
                    'jumlah' => 0
                ],
                [
                    'uuid_invoice' => 'qwerty',
                    'tanggal' => '1 Maret 2023',
                    'invoice' => '12KQWLE123',
                    'outlet' => 'Leven Medan',
                    'customer' => 'rizki setiawan',
                    'status' => ['kode' => 5, 'keterangan' => 'lewat 99 hari'],
                    'jumlah' => 0
                ],
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
     * get single data
     */
    public function get($uuidInvoice, $uuidOutlet)
    {
        try {

            $getItem = [
                'status' => [
                    'kode' => 2,
                    'keterangan' => 'belum dibayar'
                ],
                'uuid_invoice' => 'qwerty',
                'tanggal' => '1 Maret 2023',
                'tempo' => '14 maret 2023 (14 hari)',
                'no_invoice' => 'JASDH123876',
                'outlet' => 'Outlet 01',
                'customer' => 'rizki setiawan',
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
                ],
                'catatan' => null,
                'history_payment' => [
                    [
                        'paid' => 100000,
                        'date' => '1 maret 2023',
                        'left' => 1190000,
                    ]
                ],
            ];

            $response = $this->sendResponse(null, 200, $getItem);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * update data invoice
     */
    public function update($request, $uuidInvoice, $uuidOutlet)
    {
        DB::beginTransaction();
        try {

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'invoice'), 200, null);
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
     * resend data invoice
     */
    public function resend($uuidInvoice)
    {
        DB::beginTransaction();
        try {

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'invoice'), 200, null);
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
     * cancel data invoice
     */
    public function cancel($requset, $uuidInvoice, $uuidOutlet)
    {
        DB::beginTransaction();
        try {

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'invoice'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
