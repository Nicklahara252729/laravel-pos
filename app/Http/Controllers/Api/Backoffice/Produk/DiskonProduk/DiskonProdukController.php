<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\DiskonProduk;

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
use App\Http\Requests\Produk\DiskonProduk\StoreRequest;
use App\Http\Requests\Produk\DiskonProduk\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\DiskonProduk\DiskonProdukRepositories;
use App\Repositories\Log\LogRepositories;

class DiskonProdukController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $diskonProdukRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        DiskonProdukRepositories $diskonProdukRepositories
    ) {
        /**
         *  defined repositories
         */
        $this->diskonProdukRepositories = $diskonProdukRepositories;
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
        $response = $this->diskonProdukRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'diskon produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidDiscount)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->diskonProdukRepositories->get($uuidDiscount, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'diskon produk', 'uuid ' . $uuidDiscount);
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
        $log = $this->outputLogMessage('save', 'diskon produk ' . $storeRequest['gratuity_name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->diskonProdukRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidDiscount
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidDiscount, json_encode($updateRequest->all()), 'diskon produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->diskonProdukRepositories->update($updateRequest->validated(), $uuidDiscount, $uuid_outlet);

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
    public function delete($uuidDiscount)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidDiscount, null, 'diskon produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->diskonProdukRepositories->delete($uuidDiscount, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
