<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\PajakProduk;

/**
 * import collection
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
use App\Http\Requests\Produk\PajakProduk\StoreRequest;
use App\Http\Requests\Produk\PajakProduk\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\PajakProduk\PajakProdukRepositories;
use App\Repositories\Log\LogRepositories;

class PajakProdukController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $pajakProdukRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        PajakProdukRepositories $pajakProdukRepositories
    ) {
        /**
         * define repositories
         */
        $this->pajakProdukRepositories = $pajakProdukRepositories;
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
        $response = $this->pajakProdukRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'pajak produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuid_tax)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pajakProdukRepositories->get($uuid_tax, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'pajak produk', 'uuid ' . $uuid_tax);
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
        $log = $this->outputLogMessage('save', 'pajak produk ' . json_encode($storeRequest->all()));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->pajakProdukRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_tax
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_tax, json_encode($updateRequest->all()), 'pajak produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pajakProdukRepositories->update(
            $updateRequest->validated(),
            $uuid_tax,
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
    public function delete($uuid_tax)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuid_tax, null, 'pajak produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pajakProdukRepositories->delete($uuid_tax, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
