<?php

namespace App\Http\Controllers\Api\Region\Kota;

/**
 * import component collection
 */

use App\Http\Controllers\Controller;

/**
 * import trait
 */

use App\Traits\Message;

/**
 * import repositories
 */

use App\Repositories\Region\Kota\KotaRepositories;
use App\Repositories\Log\LogRepositories;

class KotaController extends Controller
{
    use Message;
    
    private $logRepositories;
    protected $kotaRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        KotaRepositories $kotaRepositories
    ) {
        /**
         * defined repositories
         */
        $this->kotaRepositories = $kotaRepositories;
        $this->logRepositories = $logRepositories;
    }

    /**
     * get data by id provinsi
     */
    public function getIdProvinsi($idProvinsi)
    {
        /**
         * load data from repositories
         */
        $response = $this->kotaRepositories->getIdProvinsi($idProvinsi);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'city by id province');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        /**
         * render data
         */
        return response()->json($response, $code);
    }

    /**
     * get data by id kota
     */
    public function getIdKota($idKota)
    {
        /**
         * load data from repositories
         */
        $response = $this->kotaRepositories->getIdKota($idKota);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'city by id kota');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        /**
         * render data
         */
        return response()->json($response, $code);
    }
}
