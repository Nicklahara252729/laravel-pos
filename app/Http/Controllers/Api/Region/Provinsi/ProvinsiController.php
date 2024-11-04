<?php

namespace App\Http\Controllers\Api\Region\Provinsi;

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

use App\Repositories\Region\Provinsi\ProvinsiRepositories;
use App\Repositories\Log\LogRepositories;

class ProvinsiController extends Controller
{
    use Message;
    
    private $logRepositories;
    protected $provinsiRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        ProvinsiRepositories $provinsiRepositories
    ) {
        /**
         * defined repositories
         */
        $this->provinsiRepositories = $provinsiRepositories;
        $this->logRepositories = $logRepositories;
    }

    /**
     * show data provinsi
     */
    public function data()
    {
        /**
         * load data from repositories
         */
        $response = $this->provinsiRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'province');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        /**
         * render data
         */
        return response()->json($response, $code);
    }

    /**
     * get data by name
     */
    public function get($name)
    {
        /**
         * load data from repositories
         */
        $response = $this->provinsiRepositories->get($name);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'province by name');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        /**
         * render data
         */
        return response()->json($response, $code);
    }
}
