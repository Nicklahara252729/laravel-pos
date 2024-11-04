<?php

namespace App\Repositories\Backoffice\GeneralSettings\GeneralSettingAssign;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;

/**
 * import trait
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import models
 */

use App\Models\GeneralSetting\GeneralSetting\GeneralSetting;
use App\Models\GeneralSetting\GeneralSettingAssign\GeneralSettingAssign;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import interface
 */

use App\Repositories\Backoffice\GeneralSettings\GeneralSettingAssign\GeneralSettingAssignRepositories;

class EloquentGeneralSettingAssignRepositories implements GeneralSettingAssignRepositories
{
    use Message, Response;

    private $initCheckerHelper;
    private $generalSetting;
    private $generalSettingAssign;

    public function __construct(
        GeneralSetting $generalSetting,
        GeneralSettingAssign $generalSettingAssign,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize model
         */
        $this->generalSetting = $generalSetting;
        $this->generalSettingAssign = $generalSettingAssign;
    }

    /**
     * all record data
     */
    public function data($uuid_outlet)
    {
        try {

            /**
             * get and check data
             */
            $data = $this->generalSettingAssign->where(["uuid_outlet" => $uuid_outlet])->get();
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'general setting'), 404]));
            endif;

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
     * get data general settings
     */
    public function get($uuid_outlet, $uuid_general_setting)
    {
        try {

            /**
             * get and check data
             */
            $checkGeneralSettingAssign = $this->initCheckerHelper->generalSettingAssignChecker(
                ["uuid_outlet" => $uuid_outlet, "uuid_general_setting" => $uuid_general_setting]
            );
            if (is_null($checkGeneralSettingAssign)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'general setting'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $checkGeneralSettingAssign);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * update data general settings
     */
    public function update($request, $uuid_general_setting_assign, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data 
             */
            $checkGeneralSettingAssign = $this->initCheckerHelper->generalSettingAssignChecker(
                ['uuid_general_setting_assign' => $uuid_general_setting_assign, 'uuid_outlet' => $uuid_outlet]
            );
            if (is_null($checkGeneralSettingAssign)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'general setting'), 404]));
            endif;

            /**
             * udpate data
             */
            $updateData = $this->generalSettingAssign->where(['uuid_general_setting_assign' => $uuid_general_setting_assign, 'uuid_outlet' => $uuid_outlet])->update($request);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', 'status'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'status'), 200, null);
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
