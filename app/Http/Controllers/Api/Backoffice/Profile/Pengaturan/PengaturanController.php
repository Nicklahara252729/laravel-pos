<?php

namespace App\Http\Controllers\Api\Backoffice\Profile\Pengaturan;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import trait
 */

use App\Traits\Message;

/**
 * import request
 */

use App\Http\Requests\Profile\Pengaturan\UpdateInfoBisnisRequest;
use App\Http\Requests\Profile\Pengaturan\UpdateNpwpRequest;
use App\Http\Requests\Profile\Pengaturan\UpdateSistemRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Profile\Pengaturan\PengaturanRepositories;
use App\Repositories\Log\LogRepositories;

class PengaturanController extends Controller
{
    use Message;

    protected $pengaturanRepositories;
    protected $logRepositories;

    public function __construct(
        PengaturanRepositories $pengaturanRepositories,
        LogRepositories $logRepositories,
    ) {
        /**
         * defined repositories
         */
        $this->pengaturanRepositories = $pengaturanRepositories;
        $this->logRepositories = $logRepositories;
    }

    /**
     * get pengaturan
     */
    public function get()
    {
        /**
         * process
         */
        $response = $this->pengaturanRepositories->get();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'pengaturan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update sistem
     */
    public function updateSistem(UpdateSistemRequest $updateRequest)
    {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', 'sistem', json_encode($updateRequest->all()), 'pengaturan');

        /**
         * process
         */
        $response  = $this->pengaturanRepositories->updateSistem($updateRequest->validated());

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response);
    }

    /**
     * update info bisnis
     */
    public function updateInfoBisnis(UpdateInfoBisnisRequest $updateRequest)
    {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', 'info bisnis', json_encode($updateRequest->all()), 'pengaturan');

        /**
         * process
         */
        $response  = $this->pengaturanRepositories->updateInfoBisnis($updateRequest->validated());

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response);
    }

    /**
     * update npwp
     */
    public function updateNpwp(UpdateNpwpRequest $updateRequest)
    {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', 'npwp', json_encode($updateRequest->all()), 'pengaturan');

        /**
         * process
         */
        $response  = $this->pengaturanRepositories->updateNpwp($updateRequest->validated());

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response);
    }
}
