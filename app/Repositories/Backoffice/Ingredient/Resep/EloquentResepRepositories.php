<?php

namespace App\Repositories\Backoffice\Ingredient\Resep;

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

use App\Imports\Backoffice\Ingredient\Resep\ResepImport;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Ingredient\Resep\ResepRepositories;

class EloquentResepRepositories implements ResepRepositories
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
     * get data recipe product
     */
    public function dataProduk($uuidOutlet)
    {
        try {
            $data = [
                [
                    'uuid_recipe' => 'qwert1123',
                    'item' => 'produk 1',
                    'varian' => 'varian 1',
                    'ingredient' => '1 ingredient',
                    'stock_alert' => null
                ],
                [
                    'uuid_recipe' => 'asdfg123',
                    'item' => 'produk 2',
                    'varian' => null,
                    'ingredient' => '2 ingredient',
                    'stock_alert' => '2 out'
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
     * get data recipe product
     */
    public function dataHalfRaw($uuidOutlet)
    {
        try {
            $data = [
                [
                    'uuid_recipe' => 'qwerty123',
                    'item'  => 'produk 1',
                    'kategori' => 'kategori 1',
                    'hasil_resep' => '2 kilogram (kg)',
                    'bahan' => '1 bahan',
                    'stock_alert' => null
                ],
                [
                    'uuid_recipe' => 'asdfgh123',
                    'item'  => 'produk 2',
                    'kategori' => 'kategori 2',
                    'hasil_resep' => '2 ingredient',
                    'bahan' => '1 bahan',
                    'stock_alert' => '1 out'
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
    public function get($uuidRecipe)
    {
        try {

            $data = [
                'produk' => 'Resep 001',
                'varian' => [
                    [
                        'name' => 'varian 1',
                        'price' => 10000
                    ],
                    [
                        'name' => 'varian 2',
                        'price' => 20000
                    ],
                ],
                'resep' => [
                    [
                        'bahan' => 'bahan 1',
                        'satuan' => 'Kilogram (kg)',
                        'jumlah' => 10,
                        'hpp' => 10000
                    ],
                    [
                        'bahan' => 'bahan 2',
                        'satuan' => 'Kilogram (kg)',
                        'jumlah' => 20,  
                        'hpp' => 20000
                    ],
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
    public function update($request, $uuidRecipe)
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
     * delete data
     */
    public function delete($uuidRecipe)
    {
        DB::beginTransaction();

        try {
            $name = 'tes resep';
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $name), 200, null);
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
            $imported = Excel::import(new ResepImport, $request);

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
}
