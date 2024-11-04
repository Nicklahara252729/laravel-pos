<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\PromoProduk;

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
 use App\Http\Requests\Produk\PromoProduk\StoreRequest;
 use App\Http\Requests\Produk\PromoProduk\UpdateRequest;
 
 /**
  * import repositories
  */
 
 use App\Repositories\Backoffice\Produk\PromoProduk\PromoProdukRepositories;
 use App\Repositories\Log\LogRepositories;

class PromoProdukController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $promoProdukRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        PromoProdukRepositories $promoProdukRepositories
    ) {
        /**
         *  defined repositories
         */
        $this->promoProdukRepositories = $promoProdukRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * static variable
         */
        $this->outlet = $request->header('outlet');
    }

    /**
     * get all record
     */
    public function data()
    {

        /**
         * process
         */
        $response = $this->promoProdukRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'promo produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidPromo)
    {
        /**
         * process
         */
        $response = $this->promoProdukRepositories->get($uuidPromo);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'promo produk', 'uuid ' . $uuidPromo);
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
        $log = $this->outputLogMessage('save', 'promo produk ' . $storeRequest['promo_name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->promoProdukRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidPromo
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidPromo, json_encode($updateRequest->all()), 'promo produk');

        /**
         * process
         */
        $response = $this->promoProdukRepositories->update($updateRequest->validated(), $uuidPromo);

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
    public function delete($uuidPromo)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidPromo, null, 'promo produk');

        /**
         * process
         */
        $response = $this->promoProdukRepositories->delete($uuidPromo);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
