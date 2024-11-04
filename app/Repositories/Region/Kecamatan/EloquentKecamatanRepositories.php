<?php

namespace App\Repositories\Region\Kecamatan;

/**
 * import component
 */

 use App\Exceptions\CustomException;

/**
 * import trait
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import models
 */

use App\Models\Region\IndonesiaDistrict\IndonesiaDistrict;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories
 */

use App\Repositories\Region\Kecamatan\KecamatanRepositories;

class EloquentKecamatanRepositories implements KecamatanRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $indonesiaDistrict;

    public function __construct(
        IndonesiaDistrict $indonesiaDistrict,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize models
         */
        $this->indonesiaDistrict = $indonesiaDistrict;

        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;
    }

    /**
     * get data by id kota
     */
    public function getIdKota($idKecamatan)
    {
        try {
            $checkDataKecamatan = $this->indonesiaDistrict->where(['city_id' => $idKecamatan])->get();
            if (count($checkDataKecamatan) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'provinsi'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $checkDataKecamatan);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * get data by id kecamatan
     */
    public function getIdKecamatan($idKecamatan)
    {
        try {
            $checkDataKecamatan = $this->indonesiaDistrict->where(['id' => $idKecamatan])->get();
            if (count($checkDataKecamatan) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'provinsi'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $checkDataKecamatan);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
