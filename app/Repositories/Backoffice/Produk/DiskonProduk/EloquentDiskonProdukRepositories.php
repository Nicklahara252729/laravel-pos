<?php

namespace App\Repositories\Backoffice\Produk\DiskonProduk;

/**
 * import component  
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Exceptions\CustomException;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import models 
 */

use App\Models\Discount\Discount;

/**
 * import helpers 
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories 
 */

use App\Repositories\Backoffice\Produk\DiskonProduk\DiskonProdukRepositories;

class EloquentDiskonProdukRepositories implements DiskonProdukRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $path;
    protected $discount;
    protected $date;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        Discount $discount
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize repositories
         */
        $this->discount = $discount;

        /**
         * static value
         */
        $this->date = Carbon::now()->toDateTimeString();
    }

    /**
     * get all record
     */
    public function data($uuid_outlet)
    {
        try {
            /**
             * get all data
             */
            $dataDiscount = $this->discount->select(
                'uuid_discount',
                'discount_name',
                'amount_status',
                'amount',
                'amount_type_fixed',
                'amount_type_custom'
            )
                ->where(['uuid_outlet' => $uuid_outlet])
                ->get();
            if (count($dataDiscount) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'diskon'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataDiscount);
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
    public function get($uuidDiscount, $uuid_outlet)
    {
        try {

            /**
             * check data discount
             */
            $getDiscount = $this->initCheckerHelper->discountChecker([
                'uuid_discount' => $uuidDiscount,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getDiscount)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'diskon'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getDiscount);
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
             * save discount
             */
            $saveData = $this->discount->create($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['discount_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['discount_name']), 201, null);
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
    public function update($req, $uuidDiscount, $uuid_outlet)
    {
        DB::beginTransaction();

        try {
            /**
             * check data
             */
            $checkDiscount = $this->initCheckerHelper->discountChecker([
                "uuid_discount" => $uuidDiscount,
                "uuid_outlet" => $uuid_outlet
            ]);
            if (empty($checkDiscount)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'diskon produk'), 404]));
            endif;

            /**
             * update data
             */
            $updateData = $this->discount->where([
                'uuid_discount' => $uuidDiscount,
                'uuid_outlet' => $uuid_outlet
            ])->update($req);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['discount_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['discount_name']), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * delete data
     */
    public function delete($uuidDiscount, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data
             */
            $checkDiscount = $this->initCheckerHelper->discountChecker([
                'uuid_discount' => $uuidDiscount,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($checkDiscount)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $discountName = $checkDiscount->discount_name;

            /**
             * delete data
             */
            $deleteData = $this->discount->where([
                'uuid_discount' => $uuidDiscount,
                'uuid_outlet' => $uuid_outlet
            ])->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', $discountName));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $discountName), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
