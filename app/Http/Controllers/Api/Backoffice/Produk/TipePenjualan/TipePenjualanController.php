<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\TipePenjualan;

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
use App\Http\Requests\Produk\TipePenjualan\StoreRequest;
use App\Http\Requests\Produk\TipePenjualan\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\TipePenjualan\TipePenjualanRepositories;
use App\Repositories\Log\LogRepositories;

class TipePenjualanController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $tipePenjualanRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        TipePenjualanRepositories $tipePenjualanRepositories
    ) {
        /**
         * define repositories
         */
        $this->tipePenjualanRepositories = $tipePenjualanRepositories;
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
     * show all record
     */
    public function data()
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->tipePenjualanRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'tipe penjualan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuid_sales_type)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->tipePenjualanRepositories->get($uuid_sales_type, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'tipe penjualan', 'uuid ' . $uuid_sales_type);
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
        $log = $this->outputLogMessage('save', 'tipe penjualan ' . json_encode($storeRequest->all()));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->tipePenjualanRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_sales_type
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_sales_type, json_encode($updateRequest->all()), 'tipe penjualan');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->tipePenjualanRepositories->update(
            $updateRequest->validated(),
            $uuid_sales_type,
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
     * delete data
     */
    public function delete($uuid_sales_type)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuid_sales_type, null, 'pajak produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->tipePenjualanRepositories->delete($uuid_sales_type, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
