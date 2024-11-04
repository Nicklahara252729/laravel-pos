<?php

namespace App\Repositories\Backoffice\Inventory\PurchasingOrder;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Maatwebsite\Excel\Facades\Excel;

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
 * import export collection
 */

use App\Imports\Backoffice\Inventory\PurchasingOrder\PurchasingOrderImport;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Inventory\PurchasingOrder\PurchasingOrderRepositories;

class EloquentPurchasingOrderRepositories implements PurchasingOrderRepositories
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
     * get all record
     */
    public function data($uuidOutlet)
    {
        try {
            $data = [
                [
                    "date" => "Senin, 17 Januari 2023",
                    "rows" => [
                        [
                            "uuid_po" => "1c87d0e2-5967-4e2c-a2d6-4f0b8e15c32d",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 1,
                                'keterangan' => 'menunggu persetuan'
                            ],
                        ],
                        [
                            "uuid_po" => "5adfa6e9-7a56-4f26-ba7d-78ac6dd393f4",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 2,
                                'keterangan' => 'pemenuhan (0%)'
                            ],
                        ],
                        [
                            "uuid_po" => "c8d8a166-ae5e-42e7-bc0c-cc4eef4bbbf9",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 3,
                                'keterangan' => 'selesai'
                            ],
                        ],
                        [
                            "uuid_po" => "f583e73b-bb42-4c2d-a6fc-2316de5a76d7",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 4,
                                'keterangan' => 'ditolak'
                            ],
                        ],
                        [
                            "uuid_po" => "f583e73b-bb42-4c2d-a6fc-2316de5a76d7",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 5,
                                'keterangan' => 'revisi'
                            ],
                        ]
                    ]
                ],
                [
                    "date" => "Senin, 18 Januari 2023",
                    "rows" => [
                        [
                            "uuid_po" => "1c87d0e2-5967-4e2c-a2d6-4f0b8e15c32d",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 1,
                                'keterangan' => 'menunggu persetuan'
                            ],
                        ],
                        [
                            "uuid_po" => "5adfa6e9-7a56-4f26-ba7d-78ac6dd393f4",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 2,
                                'keterangan' => 'pemenuhan (0%)'
                            ],
                        ],
                        [
                            "uuid_po" => "c8d8a166-ae5e-42e7-bc0c-cc4eef4bbbf9",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 3,
                                'keterangan' => 'selesai'
                            ],
                        ],
                        [
                            "uuid_po" => "f583e73b-bb42-4c2d-a6fc-2316de5a76d7",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 4,
                                'keterangan' => 'ditolak'
                            ],
                        ],
                        [
                            "uuid_po" => "f583e73b-bb42-4c2d-a6fc-2316de5a76d7",
                            "item" => "2 bahan",
                            "supplier" => "PT Kencana Abadi",
                            "nomor_po" => "#PO12345",
                            "total" => 124000,
                            "status" => [
                                'kode' => 5,
                                'keterangan' => 'revisi'
                            ],
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
     * get single data
     */
    public function get($uuidPo, $uuidOutlet)
    {
        try {

            $data = [
                'outlet' => 'Outlet 01',
                'nomor_po' => '#16806691352',
                'total' => 1000000000,
                "status" => [
                    'kode' => 2,
                    'keterangan' => 'menunggu persetujuan'
                ],
                'bahan' => [
                    [
                        'item' => 'bahan 1',
                        'qty' => 2,
                        'satuan' => 'Kilogram (kg)',
                        'biaya' => 10000,
                        'subtotal' => 20000
                    ],
                    [
                        'item' => 'bahan 2',
                        'qty' => 2,
                        'satuan' => 'Kilogram (kg)',
                        'biaya' => 20000,
                        'subtotal' => 40000
                    ],
                ],
                'log' => [
                    [
                        "date" => "Hari ini, 05/04/2023",
                        "rows" => [
                            [
                                "uuid_po_history" => "1c87d0e2-5967-4e2c-a2d6-4f0b8e15c32d",
                                "time" => "17:40",
                                "name" => "Ikki",
                                "has_link" => 1,
                                "description" => "Benar-benar memenuhi pesanan pembelian",
                                "note" => null,
                            ],
                            [
                                "uuid_po_history" => "5adfa6e9-7a56-4f26-ba7d-78ac6dd393f4",
                                "time" => "16:40",
                                "name" => "Ikki",
                                "has_link" => 1,
                                "description" => "Sebagian memenuhi pesanan pembelian",
                                "note" => null,
                            ],
                            [
                                "uuid_po_history" => "c8d8a166-ae5e-42e7-bc0c-cc4eef4bbbf9",
                                "time" => "14:40",
                                "name" => "Ikki",
                                "has_link" => 0,
                                "description" => "Menyetujui pemesanan pembelian",
                                "note" => "catatan tambahan",
                            ],
                        ]
                    ],
                    [
                        "date" => "Kemarin, 04/04/2023",
                        "rows" => [
                            [
                                "uuid_po_history" => "1c87d0e2-5967-4e2c-a2d6-4f0b8e15c32d",
                                "time" => "17:40",
                                "name" => "Ikki",
                                "has_link" => 0,
                                "description" => "Membuat pesanan pembelian",
                                "note" => null,
                            ]
                        ]
                    ]
                ],
                'pesanan' => [
                    [
                        'item' => 'bahan 1',
                        'satuan' => 'Kilogram (kg)',                        
                        'dipenuhi' => 10,
                        'sisa' => 20
                    ],
                    [
                        'item' => 'bahan 2',
                        'satuan' => 'Kilogram (kg)',                        
                        'dipenuhi' => 20,
                        'sisa' => 40
                    ],
                ],
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

    /**
     * save data
     */
    public function save($request)
    {
        DB::beginTransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $request['produk']), 201, null);
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
     * update data
     */
    public function update($request, $uuidPo)
    {
        DB::begintransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $request['produk']), 200, null);
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
     * reject data
     */
    public function reject($request, $uuidPo)
    {
        DB::beginTransaction();

        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'Tolak PO'), 200, null);
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
     * import data resep
     */
    public function import($request)
    {
        try {
            $imported = Excel::import(new PurchasingOrderImport, $request);

            if (!$imported) :
                throw new \Exception($this->outputMessage('fail import', 'resep'));
            endif;
            $response = $this->sendResponse($this->outputMessage('imported', 'resep'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * riwayat pemenuhan
     */
    public function riwayat($uuidPo, $uuidOutlet)
    {
        try {

            $data = [
                'outlet' => 'Outlet 01',
                'nomor_po' => '#16806691352',
                'bahan' => [
                    [
                        'item' => 'bahan 1',
                        'qty' => 2,
                        'satuan' => 'Kilogram (kg)'
                    ],
                    [
                        'item' => 'bahan 2',
                        'qty' => 2,
                        'satuan' => 'Kilogram (kg)'
                    ],
                ],
                'log' => [
                    [
                        "date" => "Senin, 17 Maret 2024",
                        "dipenuhi" => 4,
                        "rusak" => 1
                    ],
                    [
                        "date" => "Selasa, 18 Maret 2024",
                        "dipenuhi" => 10,
                        "rusak" => 3
                    ],
                    [
                        "date" => "Rabu, 19 Maret 2024",
                        "dipenuhi" => 10,
                        "rusak" => 1
                    ]
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

    /**
     * update data
     */
    public function updateProsesPesanan($request, $uuidPo)
    {
        DB::begintransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'proses pesanan'), 200, null);
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
     * hentikan pemenuhan
     */
    public function hentikanPemenuhan($uuidPo)
    {
        DB::begintransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'hentikan pemenuhan'), 200, null);
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
