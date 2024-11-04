<?php

namespace App\Repositories\Region\Provinsi;

/**
 * import component
 */

use App\Exceptions\CustomException;

/**
 * import models
 */

use App\Models\Region\IndonesiaProvince\IndonesiaProvince;

/**
 * import trait
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories
 */

use App\Repositories\Region\Provinsi\ProvinsiRepositories;

class EloquentProvinsiRepositories implements ProvinsiRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $indonesiaProvince;

    public function __construct(
        IndonesiaProvince $indonesiaProvince,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize models
         */
        $this->indonesiaProvince = $indonesiaProvince;

        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;
    }

    /**
     * data provinsi
     */
    public function data()
    {
        try {
            $dataProvinsi = $this->indonesiaProvince->get();
            if (count($dataProvinsi) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'provinsi'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataProvinsi);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * get data by name
     */
    public function get($name)
    {
        try {
            $checkDataProvinsi = $this->initCheckerHelper->provinsiChecker(['name' => $name]);
            if (is_null($checkDataProvinsi)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'provinsi'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $checkDataProvinsi);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
