<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\Gratuity;

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
use Illuminate\Http\Request;
use App\Http\Requests\Produk\Gratuity\StoreRequest;
use App\Http\Requests\Produk\Gratuity\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\Gratuity\GratuityRepositories;
use App\Repositories\Log\LogRepositories;

class GratuityController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $gratuityRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        GratuityRepositories $gratuityRepositories
    ) {
        /**
         *  defined repositories
         */
        $this->gratuityRepositories = $gratuityRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * static variable
         */
        $this->outlet = $request->header('outlet');
    }

    /**
     * set uuid outlet
     */
    private function uuidOutlet()
    {
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $this->outlet;
    }

    /**
     * get all record
     */
    public function data()
    {

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->gratuityRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'produk gratuity');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuid_gratuity)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->gratuityRepositories->get($uuid_gratuity, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'produk gratuity', 'uuid ' . $uuid_gratuity);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

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
        $log = $this->outputLogMessage('save', 'produk gratuity ' . $storeRequest['gratuity_name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->gratuityRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_gratuity
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_gratuity, json_encode($updateRequest->all()), 'produk gratuity');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->gratuityRepositories->update($updateRequest->validated(), $uuid_gratuity, $uuid_outlet);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * delete data
     */
    public function delete($uuid_gratuity)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuid_gratuity, null, 'produk gratuity');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->gratuityRepositories->delete($uuid_gratuity, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
