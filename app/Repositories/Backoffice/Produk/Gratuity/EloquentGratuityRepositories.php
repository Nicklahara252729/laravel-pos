<?php

namespace App\Repositories\Backoffice\Produk\Gratuity;

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

use App\Models\Gratuity\Gratuity;

/**
 * import helpers 
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories 
 */

use App\Repositories\Backoffice\Produk\Gratuity\GratuityRepositories;

class EloquentGratuityRepositories implements GratuityRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $path;
    protected $gratuity;
    protected $date;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        Gratuity $gratuity
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize repositories
         */
        $this->gratuity = $gratuity;

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
            $dataGratuity = $this->gratuity->select('uuid_gratuity', 'gratuity_name', 'amount')
                ->where(['uuid_outlet' => $uuid_outlet])
                ->get();
            if (count($dataGratuity) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'gratifikasi'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataGratuity);
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
    public function get($uuid_gratuity, $uuid_outlet)
    {
        try {

            /**
             * check data gratuity
             */
            $getGratuity = $this->initCheckerHelper->gratuityChecker([
                'uuid_gratuity' => $uuid_gratuity,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getGratuity)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'gratifikasi'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getGratuity);
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
             * save gratuity
             */
            $saveData = $this->gratuity->create($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['gratuity_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['gratuity_name']), 201, null);
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
    public function update($req, $uuid_gratuity, $uuid_outlet)
    {
        DB::beginTransaction();

        try {
            /**
             * check data
             */
            $checkGratuity = $this->initCheckerHelper->gratuityChecker([
                "uuid_gratuity" => $uuid_gratuity,
                "uuid_outlet" => $uuid_outlet
            ]);
            if (empty($checkGratuity)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'gratifikasi produk'), 404]));
            endif;

            /**
             * update data
             */
            $updateData = $this->gratuity->where([
                'uuid_gratuity' => $uuid_gratuity,
                'uuid_outlet' => $uuid_outlet
            ])->update($req);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['gratuity_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['gratuity_name']), 200, null);
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
    public function delete($uuid_gratuity, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data
             */
            $checkGratuity = $this->initCheckerHelper->gratuityChecker([
                'uuid_gratuity' => $uuid_gratuity,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($checkGratuity)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $gratuityName = $checkGratuity->gratuity_name;

            /**
             * delete data
             */
            $deleteData = $this->gratuity->where([
                'uuid_gratuity' => $uuid_gratuity,
                'uuid_outlet' => $uuid_outlet
            ])->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', $gratuityName));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $gratuityName), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
