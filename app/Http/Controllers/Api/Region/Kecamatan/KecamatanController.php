<?php

namespace App\Http\Controllers\Api\Region\Kecamatan;

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

use App\Repositories\Region\Kecamatan\KecamatanRepositories;
use App\Repositories\Log\LogRepositories;

class KecamatanController extends Controller
{
    use Message;

    private $logRepositories;
    protected $kecamatanRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        KecamatanRepositories $kecamatanRepositories
    ) {
        /**
         * defined repositories
         */
        $this->kecamatanRepositories = $kecamatanRepositories;
        $this->logRepositories = $logRepositories;
    }

    /**
     * get data by id kota
     */
    public function getIdKota($idKota)
    {
        /**
         * load data from repositories
         */
        $response = $this->kecamatanRepositories->getIdKota($idKota);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'district');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        /**
         * render data
         */
        return response()->json($response, $code);
    }

    /**
     * get data by id kecamatan
     */
    public function getIdKecamatan($idKecamatan)
    {
        /**
         * load data from repositories
         */
        $response = $this->kecamatanRepositories->getIdKecamatan($idKecamatan);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'disctrict');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        /**
         * render data
         */
        return response()->json($response, $code);
    }
}
