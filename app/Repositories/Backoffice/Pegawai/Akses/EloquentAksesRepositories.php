<?php

namespace App\Repositories\Backoffice\Pegawai\Akses;

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

use App\Models\User\Access\Access;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import interface 
 */

use App\Repositories\Backoffice\Pegawai\Akses\AksesRepositories;

class EloquentAksesRepositories implements AksesRepositories
{
    use Message, Response;

    private $date;
    private $access;
    private $initCheckerHelper;

    public function __construct(
        Access $access,
        CheckerHelpers $checkerHelpers,
    ) {
        /**
         * initialize model
         */
        $this->access = $access;

        /**
         * static value
         */
        $this->date = Carbon::now()->toDateTimeString();

        /**
         * initialize helper
         */
        $this->initCheckerHelper = $checkerHelpers;
    }

    /**
     * get all record
     */
    public function data($uuidOutlet)
    {
        try {
            /**
             * get all data
             */
            $dataAkses = $this->access->select(
                'uuid_access',
                'access_name',
                DB::raw('(SELECT COUNT(*) FROM users where uuid_access = accesses.uuid_access) AS jumlah_pegawai'),
                DB::raw('CONCAT(CASE WHEN backoffice_permission IS NOT NULL THEN "Backoffice" ELSE "" END, CASE WHEN backoffice_permission IS NOT NULL AND app_permission IS NOT NULL THEN " dan " ELSE "" END, CASE WHEN app_permission IS NOT NULL THEN "Aplikasi Mobile" ELSE "" END) AS platform')
            )
                ->where('uuid_outlet', $uuidOutlet)
                ->get();
            if (count($dataAkses) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'akses'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataAkses);
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
            $saveData = $this->access->create($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['access_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['access_name']), 201, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        /**
         * send response to controller
         */
        return $response;
    }

    /**
     * get single data
     */
    public function get($uuid_access, $uuid_outlet)
    {
        try {
            /**
             * check data akses
             */
            $getDataAccess = $this->initCheckerHelper->accessChecker(["uuid_access" => $uuid_access, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($getDataAccess)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'akses'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getDataAccess);
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
    public function update($req, $uuid_access, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data
             */
            $getDataAccessByID = $this->initCheckerHelper->accessChecker(["uuid_access" => $uuid_access, 'uuid_outlet' => $uuid_outlet]);
            if (empty($getDataAccessByID)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'akses'), 404]));
            endif;

            /**
             * update process
             */
            $updateData = $this->access->where(["uuid_access" => $uuid_access, 'uuid_outlet' => $uuid_outlet])->update($req);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['access_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['access_name']), 200, null);
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
    public function delete($uuid_access, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check data
             */
            $getDataAccess = $this->initCheckerHelper->accessChecker(["uuid_access" => $uuid_access, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($getDataAccess)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $aksesName = $getDataAccess->access_name;

            /**
             * delete data
             */
            $prosesDelete = $this->access->where(["uuid_access" => $uuid_access, 'uuid_outlet' => $uuid_outlet])->delete();
            if (!$prosesDelete) :
                throw new \Exception($this->outputMessage('undeleted', $aksesName));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $aksesName), 200, null);
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
