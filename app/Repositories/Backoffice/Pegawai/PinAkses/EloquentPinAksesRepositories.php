<?php

namespace App\Repositories\Backoffice\Pegawai\PinAkses;

/**
 * import component
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;

/**
 * import traits
 */

use App\Traits\Response;
use App\Traits\Message;
use App\Traits\ValidatorFormat;

/**
 * import models
 */

use App\Models\User\PinAccess\PinAccess;
use App\Models\User\User\User;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import interface
 */

use App\Repositories\Backoffice\Pegawai\PinAkses\PinAksesRepositories;

class EloquentPinAksesRepositories implements PinAksesRepositories
{
    use Response, Message, ValidatorFormat;

    protected $initCheckerHelper;
    protected $pinAkses;
    protected $user;

    public function __construct(
        User $user,
        PinAccess $pinAkses,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */
        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize model
         */
        $this->pinAkses = $pinAkses;
        $this->user = $user;
    }

    /**
     * get all data
     */
    public function data($uuid_outlet)
    {
        try {
            /**
             * get all data
             */
            $data = $this->user->join('outlets', 'users.uuid_outlet', '=', 'outlets.uuid_outlet')
                ->join('accesses', 'users.uuid_access', '=', 'accesses.uuid_access')
                ->where(['users.uuid_outlet' => $uuid_outlet, ['users.pin', '!=', '']])
                ->get(['users.uuid_user', 'users.name', 'users.pin', 'accesses.access_name']);
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'akses'), 404]));
            endif;

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
     * get single data
     */
    public function get($uuid_user, $uuid_outlet)
    {
        try {
            $getUser = $this->initCheckerHelper->pinAccessChecker(["pin_accesses.uuid_user" => $uuid_user, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($getUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pengguna'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getUser);
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
    public function update($req, $uuid_user, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check user
             */
            $getUserById = $this->initCheckerHelper->pinAccessChecker(["pin_accesses.uuid_user" => $uuid_user, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($getUserById)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pengguna'), 404]));
            endif;

            /**
             * update process
             */
            $saveData = $this->pinAkses->where(["uuid_user" => $uuid_user])->update($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('update fail', 'pin akses'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'pin akses'), 200, null);
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
