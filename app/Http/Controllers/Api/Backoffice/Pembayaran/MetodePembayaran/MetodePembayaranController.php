<?php

namespace App\Http\Controllers\Api\Backoffice\Pembayaran\MetodePembayaran;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import request
 */

use App\Http\Requests\Pembayaran\MetodePembayaran\StoreRequest;
use App\Http\Requests\Pembayaran\MetodePembayaran\UpdateRequest;

/**
 * import traits
 */

use App\Traits\Message;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Pembayaran\MetodePembayaran\MetodePembayaranRepositories;
use App\Repositories\Log\LogRepositories;

class MetodePembayaranController extends Controller
{
    use Message;

    private $logRepositories;
    private $metodePembayaranRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        MetodePembayaranRepositories $metodePembayaranRepositories
    ) {
        /**
         * defined repositories
         */
        $this->metodePembayaranRepositories = $metodePembayaranRepositories;
        $this->logRepositories = $logRepositories;
    }

    /**
     * get payment list
     */
    public function paymentList()
    {
        /**
         * process
         */
        $response = $this->metodePembayaranRepositories->paymentList();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'payment list');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get data metode pembayaran
     */
    public function data()
    {
        /**
         * process
         */
        $response = $this->metodePembayaranRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'metode pembayaran');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidPaymentConfiguration)
    {
        /**
         * process
         */
        $response = $this->metodePembayaranRepositories->get($uuidPaymentConfiguration);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'metode pembayaran', 'uuid ' . $uuidPaymentConfiguration);
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
        $log = $this->outputLogMessage('save', 'metode pembayaran ' . $storeRequest['configuration_name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->metodePembayaranRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidPaymentConfiguration
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidPaymentConfiguration, json_encode($updateRequest->all()), 'metode pembayaran');

        /**
         * process
         */
        $response = $this->metodePembayaranRepositories->update(
            $updateRequest->validated(),
            $uuidPaymentConfiguration
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
     * delete data
     */
    public function delete($uuidPaymentConfiguration)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidPaymentConfiguration, null, 'metode pembayaran');

        /**
         * process
         */
        $response = $this->metodePembayaranRepositories->delete($uuidPaymentConfiguration);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
