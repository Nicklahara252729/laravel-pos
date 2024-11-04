<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\KategoriProduk;

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
use App\Http\Requests\Produk\KategoriProduk\StoreRequest;
use App\Http\Requests\Produk\KategoriProduk\UpdateRequest;
use App\Http\Requests\Produk\KategoriProduk\AssignItemRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\KategoriProduk\KategoriProdukRepositories;
use App\Repositories\Log\LogRepositories;

class KategoriProdukController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $kategoriProdukRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        KategoriProdukRepositories $kategoriProdukRepositories
    ) {
        /**
         * defined repositories
         */
        $this->kategoriProdukRepositories = $kategoriProdukRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;

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
        $search = !empty($this->request->get('search')) ? $this->request->get('search') : null;
        $response = $this->kategoriProdukRepositories->data($uuid_outlet, $search);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'kategori produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuid_kategori_produk)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriProdukRepositories->get($uuid_kategori_produk, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'kategori produk', 'uuid ' . $uuid_kategori_produk);
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
        $log = $this->outputLogMessage('save', 'kategori produk ' . $storeRequest['category_name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriProdukRepositories->save($storeRequest->validated(), $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_kategori_produk
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_kategori_produk, json_encode($updateRequest->all()), 'kategori produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriProdukRepositories->update(
            $updateRequest->validated(),
            $uuid_kategori_produk,
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
    public function delete($uuid_kategori_produk)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuid_kategori_produk, null, 'kategori produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriProdukRepositories->delete($uuid_kategori_produk, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * assign produk
     */
    public function assignItem(
        AssignItemRequest $request,
        $uuid_kategori_produk
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_kategori_produk, json_encode($request->all()), 'assign item');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriProdukRepositories->assignItem(
            $request->validated(),
            $uuid_kategori_produk,
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
}
