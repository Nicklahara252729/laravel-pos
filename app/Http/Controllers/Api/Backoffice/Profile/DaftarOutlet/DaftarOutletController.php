<?php

namespace App\Http\Controllers\Api\Backoffice\Profile\DaftarOutlet;

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

use App\Http\Requests\Profile\DaftarOutlet\StoreRequest;
use App\Http\Requests\Profile\DaftarOutlet\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Profile\DaftarOutlet\DaftarOutletRepositories;
use App\Repositories\Log\LogRepositories;

class DaftarOutletController extends Controller
{
    use Message;

    private $logRepositories;
    protected $outletRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        DaftarOutletRepositories $outletRepositories
    ) {
        /**
         * defined repositories
         */
        $this->outletRepositories = $outletRepositories;
        $this->logRepositories = $logRepositories;
    }

    /**
     * get single data
     */
    public function get($uuid_outlet)
    {
        /**
         * process
         */
        $response = $this->outletRepositories->get($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'daftar outlet', 'uuid ' . $uuid_outlet);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get all record
     */
    public function data()
    {
        /**
         * process
         */
        $response = $this->outletRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'daftar outlet');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        $uuid_outlet,
        UpdateRequest $updateRequest
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_outlet, 'daftar outlet ' . json_encode($updateRequest->all()), 'daftar outlet');

        /**
         * process
         */
        $response  = $this->outletRepositories->update(
            $updateRequest->validated(),
            $uuid_outlet
        );
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * save data
     */
    public function save(StoreRequest $storeRequest)
    {
        /**
         * save log
         */
        $log = $this->outputLogMessage('save', 'daftar outlet ' . json_encode($storeRequest->all()));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->outletRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * delete data
     */
    public function delete($uuid_outlet)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuid_outlet, null, 'daftar outlet');

        /**
         * process
         */
        $response = $this->outletRepositories->delete($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);
        
        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
