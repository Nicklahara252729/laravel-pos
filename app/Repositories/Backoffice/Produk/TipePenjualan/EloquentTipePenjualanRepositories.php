<?php

namespace App\Repositories\Backoffice\Produk\TipePenjualan;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import models
 */

use App\Models\SalesType\SalesType;
use App\Models\Gratuity\Gratuity;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import interface
 */

use App\Repositories\Backoffice\Produk\TipePenjualan\TipePenjualanRepositories;

class EloquentTipePenjualanRepositories implements TipePenjualanRepositories
{
    use Message, Response;

    private $initCheckerHelper;
    private $salesType;
    private $gratuity;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        SalesType $salesType,
        Gratuity $gratuity
    ) {
        /**
         * initialize helper
         */
        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize model
         */
        $this->salesType = $salesType;
        $this->gratuity = $gratuity;
    }

    /**
     * show all record
     */
    public function data($uuid_outlet)
    {
        try {
            /**
             * get all data
             */
            $dataSalesType = $this->salesType->join('gratuities', 'sales_types.uuid_gratuity', '=', 'gratuities.uuid_gratuity')
                ->where(['sales_types.uuid_outlet' => $uuid_outlet])
                ->get(['sales_types.uuid_sales_type', 'sales_types.sales_type_name', 'sales_types.sales_status', 'gratuities.gratuity_name', 'gratuities.amount as gratuity_amount']);
            if (count($dataSalesType) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'tipe penjualan'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataSalesType);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * get single data
     */
    public function get($uuid_sales_type, $uuid_outlet)
    {
        try {

            /**
             * get sales type
             */
            $getSalesType = $this->salesType->select('uuid_sales_type', 'sales_type_name', 'sales_status', 'uuid_gratuity')
                ->where(['uuid_sales_type' => $uuid_sales_type, 'uuid_outlet' => $uuid_outlet])
                ->first();
            if (is_null($getSalesType)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'tipe penjualan'), 404]));
            endif;

            /**
             * get gratuity
             */
            $getGratuity = $this->gratuity->select('uuid_gratuity', 'gratuity_name', 'amount')->where('uuid_gratuity', $getSalesType->uuid_gratuity)->get();

            $data = [
                'uuid_sales_type' => $getSalesType->uuid_sales_type,
                'sales_type_name' => $getSalesType->sales_type_name,
                'sales_status' => $getSalesType->sales_status,
                'gratuity' => $getGratuity
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
    public function save($req)
    {
        DB::beginTransaction();
        try {
            /**
             * save data
             */
            $saveData = $this->salesType->create($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['sales_type_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['sales_type_name']), 201, null);
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
    public function update($req, $uuid_sales_type, $uuid_outlet)
    {
        DB::beginTransaction();

        try {
            /**
             * check data sales type
             */
            $checkSalesType = $this->initCheckerHelper->salesTypeChecker(['uuid_sales_type' => $uuid_sales_type, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($checkSalesType)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'tipe penjualan'), 404]));
            endif;

            /**
             * save data
             */
            $updateData = $this->salesType->where(['uuid_sales_type' => $uuid_sales_type, 'uuid_outlet' => $uuid_outlet])->update($req);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['sales_type_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['sales_type_name']), 200, null);
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
    public function delete($uuid_sales_type, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data
             */
            $checkSalesType = $this->initCheckerHelper->salesTypeChecker(['uuid_sales_type' => $uuid_sales_type, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($checkSalesType)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $salesType = $checkSalesType->sales_type_name;

            /**
             * delete process
             */
            $deleteData = $this->salesType->where(['uuid_sales_type' => $uuid_sales_type, 'uuid_outlet' => $uuid_outlet])->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', $salesType));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $salesType), 200, null);
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
