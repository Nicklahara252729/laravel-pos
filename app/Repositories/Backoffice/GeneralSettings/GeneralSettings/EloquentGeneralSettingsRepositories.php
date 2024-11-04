<?php

namespace App\Repositories\Backoffice\GeneralSettings\GeneralSettings;

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
 * import models
 */

use App\Models\GeneralSetting\GeneralSetting\GeneralSetting;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import interface
 */

use App\Repositories\Backoffice\GeneralSettings\GeneralSettings\GeneralSettingsRepositories;

class EloquentGeneralSettingsRepositories implements GeneralSettingsRepositories
{
    use Response, Message;

    protected $initCheckerHelper;
    protected $generalSetting;

    public function __construct(
        GeneralSetting $generalSetting,
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
    }

    /**
     * all record data
     */
    public function data()
    {
        try {
            $data = $this->generalSetting->all();

            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'general settings'), 404]));
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
    public function get($param)
    {
        try {
            $checkGeneralSettings = $this->initCheckerHelper->generalSettingChecker($param);
            if (is_null($checkGeneralSettings)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'general settings'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $checkGeneralSettings);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
