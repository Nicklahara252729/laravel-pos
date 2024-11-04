<?php

namespace App\Repositories\Backoffice\Pegawai\DaftarPegawai;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;
use App\Exceptions\CustomException;
use Maatwebsite\Excel\Facades\Excel;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import models
 */

use App\Models\User\User\User;
use App\Models\User\PinAccess\Pinaccess;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import export collection
 */

use App\Imports\Backoffice\Pegawai\DaftarPegawai\DaftarPegawaiImport;

/**
 * import interface
 */

use App\Repositories\Backoffice\Pegawai\DaftarPegawai\DaftarPegawaiRepositories;

class EloquentDaftarPegawaiRepositories implements DaftarPegawaiRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $user;
    protected $path;
    protected $pinAccess;
    protected $date;

    public function __construct(
        User $user,
        PinAccess $pinAccess,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize model
         */
        $this->user = $user;
        $this->pinAccess = $pinAccess;

        /**
         * static value
         */
        $this->path = path('user');
        $this->date = Carbon::now()->toDateTimeString();
    }

    /**
     * get all record
     */
    public function data($status, $uuid_outlet)
    {
        try {

            /**
             * get all data
             */
            $deletedAt = $status == 'active' ? ['deleted_at', '=', null] : ['deleted_at', '!=', null];
            $dataUser = $this->user->select(
                'users.uuid_user',
                'users.name',
                'accesses.access_name',
                'outlets.outlet_name',
                'email',
                'users.phone',
                DB::raw('CASE WHEN profile_photo_path IS NULL THEN CONCAT("' . url($this->path) . '/", "blank.png") ELSE CONCAT("' . url($this->path) . '/", profile_photo_path) END as profile_photo_path')
            )
                ->join('outlets', 'users.uuid_outlet', '=', 'outlets.uuid_outlet')
                ->leftJoin('accesses', 'users.uuid_access', '=', 'accesses.uuid_access')
                ->where([['users.uuid_outlet', $uuid_outlet], $deletedAt])
                ->get();
            if (count($dataUser) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pegawai'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataUser);
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
            $getUser = $this->initCheckerHelper->userChecker(["uuid_user" => $uuid_user, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($getUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pegawai'), 404]));
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
     * save data
     */
    public function save($req)
    {
        DB::beginTransaction();
        try {
            /**
             * form data
             */
            $req['uuid_user']   = Uuid::uuid4()->getHex();
            $req['password']    = trim(Hash::make($req['password']));

            /**
             * check uploaded file
             */
            if (isset($req['profile_photo_path'])) :
                $file = $req['profile_photo_path'];
                $profile_photo_path = Uuid::uuid4()->getHex() . '.' . $file->extension();
                if (!$file->move(public_path($this->path), $profile_photo_path)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $req['profile_photo_path'] = $profile_photo_path;
            endif;

            /**
             * save pin akses
             */
            $dataPin = ["uuid_user" => $req['uuid_user']];
            $savePinAccess = $this->pinAccess->create($dataPin);
            if (!$savePinAccess) :
                throw new \Exception($this->outputMessage('unsaved', 'pin akses'));
            endif;

            /**
             * save data user
             */
            $saveData = $this->user->create($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['name']), 201, null);
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
    public function update($req, $uuid_user, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check user
             */
            $checkUser = $this->initCheckerHelper->UserChecker(['uuid_user' => $uuid_user, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($checkUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pegawai'), 404]));
            endif;

            /**
             * upload file
             */
            if (isset($req['profile_photo_path'])) :
                $file  = $req['profile_photo_path'];
                $profile_photo_path = Uuid::uuid4()->getHex() . '.' . $file->extension();

                /**
                 * check file on local storage
                 */
                $photoOld = basename($checkUser->profile_photo_path);
                if (file_exists(public_path($this->path . "/" . $photoOld)) && $photoOld != 'blank.png') :
                    unlink(public_path($this->path . "/" . $photoOld));
                endif;

                /**
                 * check directoty
                 */
                if (!$file->move(public_path($this->path), $profile_photo_path)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $req['profile_photo_path'] = $profile_photo_path;
            endif;

            /**
             * save data user
             */
            $saveData = $this->user->where(["uuid_user" => $uuid_user, 'uuid_outlet' => $uuid_outlet])->update($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('update fail', $req['name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['name']), 200, null);
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
     * restore data
     */
    public function restore($uuid_user, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check data
             */
            $getUser = $this->initCheckerHelper->userChecker(["uuid_user", $uuid_user, 'uuid_outlet' => $uuid_outlet], 'check delete');
            if (is_null($getUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pegawai'), 404]));
            endif;
            $name = $getUser->name;

            /**
             * delete data
             */
            $deleteUser = $this->user->where(["uuid_user" => $uuid_user, 'uuid_outlet' => $uuid_outlet])->update(["deleted_at" => null]);
            if (!$deleteUser) :
                throw new \Exception($this->outputMessage('restore fail', $name));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('restore'), 200, null);
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
    public function delete($uuid_user, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check data
             */
            $getUser = $this->initCheckerHelper->userChecker(["uuid_user" => $uuid_user, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($getUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $name = $getUser->name;

            /**
             * delete data
             */
            $deleteUser = $this->user->where(["uuid_user" => $uuid_user, 'uuid_outlet' => $uuid_outlet])->update(["deleted_at" => $this->date]);
            if (!$deleteUser) :
                throw new \Exception($this->outputMessage('undeleted', $name));
            endif;

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
     * delete permanen data
     */
    public function deletePermanent($uuid_user, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check data
             */
            $getUser = $this->initCheckerHelper->userChecker(["uuid_user", $uuid_user, 'uuid_outlet' => $uuid_outlet], 'check delete');
            if (is_null($getUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $name = $getUser->name;
            $photoOld = basename($getUser->profile_photo_path);

            /**
             * remove upload file
             * check file on local storage
             */
            if (file_exists(public_path($photoOld)) && $photoOld != 'blank.png') :
                unlink(public_path($photoOld));
            endif;

            /**
             * delete data
             */
            $deleteUser = $this->user->where(["uuid_user" => $uuid_user, 'uuid_outlet' => $uuid_outlet])->delete();
            if (!$deleteUser) :
                throw new \Exception($this->outputMessage('undeleted permanent', $name));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted permanent', $name), 200, null);
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
     * import data
     */
    public function import($request)
    {
        try {
            $imported = Excel::import(new DaftarPegawaiImport, $request);

            if (!$imported) :
                throw new \Exception($this->outputMessage('fail import', 'daftar pegawai'));
            endif;

            $response = $this->sendResponse($this->outputMessage('imported', 'daftar pegawai'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
