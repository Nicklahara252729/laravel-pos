<?php

namespace App\Repositories\Backoffice\Inventory\RingkasanInventory;

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

use App\Repositories\Backoffice\Inventory\RingkasanInventory\RingkasanInventoryRepositories;

class EloquentRingkasanInventoryRepositories implements RingkasanInventoryRepositories
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
     * get data ringkasan inventory
     */
    public function data()
    {
        try {
            $data = [
                [
                    'uuid_ringkasan_inventory' => '',
                    'bahan' => 'Bahan A',
                    'kategori' => 'Tanpa Kategori',
                    'stok_awal' => 0,
                    'stok_akhir' => 0,
                    'unit' => 'botol (btl)'
                ],
                [
                    'uuid_ringkasan_inventory' => '',
                    'bahan' => 'Bahan B',
                    'kategori' => 'Tanpa Kategori',
                    'stok_awal' => 0,
                    'stok_akhir' => 0,
                    'unit' => 'butir (btr)'
                ],
                [
                    'uuid_ringkasan_inventory' => '',
                    'bahan' => 'Bahan C',
                    'kategori' => 'Tanpa Kategori',
                    'stok_awal' => 0,
                    'stok_akhir' => 0,
                    'unit' => 'bal'
                ],
                [
                    'uuid_ringkasan_inventory' => '',
                    'bahan' => 'Bahan D',
                    'kategori' => 'Tanpa Kategori',
                    'stok_awal' => 0,
                    'stok_akhir' => 0,
                    'unit' => 'bungkus'
                ],
                [
                    'uuid_ringkasan_inventory' => '',
                    'bahan' => 'Bahan E',
                    'kategori' => 'Tanpa Kategori',
                    'stok_awal' => 0,
                    'stok_akhir' => 0,
                    'unit' => 'kilogram (kg)'
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
