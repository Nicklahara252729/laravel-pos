<?php

namespace App\Repositories\Backoffice\Produk\PajakProduk;

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

use App\Models\Tax\Tax;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\PajakProduk\PajakProdukRepositories;

class EloquentPajakProdukRepositories implements PajakProdukRepositories
{

    use Message, Response;

    protected $initCheckerHelper;
    protected $tax;
    protected $date;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        Tax $tax
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize model
         */

        $this->tax = $tax;

        /**
         * static value
         */
        $this->date = Carbon::now()->toDateTimeString();
    }

    /**
     * show all record data
     */
    public function data($uuid_outlet)
    {
        try {
            /**
             * get all data
             */
            $dataTax = $this->tax->select('uuid_tax', 'tax_information', 'amount')
                ->where(['uuid_outlet' => $uuid_outlet, 'deleted_at' => null])
                ->get();
            if (count($dataTax) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pajak produk'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataTax);
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
             * save data category
             */

            $saveData = $this->tax->create($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['tax_information']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['tax_information']), 201, null);
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
    public function update($req, $uuid_tax, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check tax
             */
            $checkTax = $this->tax->where(['uuid_tax' => $uuid_tax, 'uuid_outlet' => $uuid_outlet])
                ->whereNull('deleted_at')
                ->first();
            if (is_null($checkTax)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pajak'), 404]));
            endif;

            /**
             * save data
             */
            $saveData = $this->tax->where(['uuid_tax' => $uuid_tax, 'uuid_outlet' => $uuid_outlet])->update($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('update fail', $req['tax_information']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['tax_information']), 200, null);
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
    public function delete($uuid_tax, $uuid_outlet)
    {

        DB::beginTransaction();
        try {

            /**
             * check data
             */
            $checkTax = $this->initCheckerHelper->taxChecker(['uuid_tax' => $uuid_tax, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($checkTax)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $taxInformation = $checkTax->tax_information;

            /**
             * save data category
             */
            $deleteTax = $this->tax->where(['uuid_tax' => $uuid_tax, 'uuid_outlet' => $uuid_outlet])->update(["deleted_at" => $this->date]);
            if (!$deleteTax) :
                throw new \Exception($this->outputMessage('undeleted', $taxInformation));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $taxInformation), 200, null);
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
     * get single data
     */
    public function get($uuid_tax, $uuid_outlet)
    {
        try {
            $getTax = $this->initCheckerHelper->taxChecker(["uuid_tax" => $uuid_tax, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($getTax)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pajak produk'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getTax);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
