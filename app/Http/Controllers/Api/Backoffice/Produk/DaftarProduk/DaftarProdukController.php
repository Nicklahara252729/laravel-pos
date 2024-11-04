<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\DaftarProduk;

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
use App\Http\Requests\Produk\DaftarProduk\StoreRequest;
use App\Http\Requests\Produk\DaftarProduk\UpdateRequest;
use App\Http\Requests\Pegawai\DaftarPegawai\ImportRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\DaftarProduk\DaftarProdukRepositories;
use App\Repositories\Log\LogRepositories;

class DaftarProdukController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $daftarProdukRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        DaftarProdukRepositories $daftarProdukRepositories
    ) {
        /**
         * define repository
         */
        $this->daftarProdukRepositories = $daftarProdukRepositories;
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
     * data all record
     */
    public function data()
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarProdukRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'daftar produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidItem)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarProdukRepositories->get($uuidItem, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'daftar produk', 'uuid ' . $uuidItem);
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
        $log = $this->outputLogMessage('save', 'daftar produk ' . $storeRequest['product_name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->daftarProdukRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidItem
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidItem, json_encode($updateRequest->validated()), 'daftar produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarProdukRepositories->update($updateRequest->validated(), $uuidItem, $uuid_outlet);

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
    public function delete($uuidItem)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidItem, null, 'daftar produk');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarProdukRepositories->delete($uuidItem, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get item by kategori
     */
    public function itemByKategori($uuidCategori)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarProdukRepositories->itemByKategori($uuidCategori, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'daftar produk by kategori', 'uuid ' . $uuidCategori);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'daftar produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }

    /**
     * import daftar produk
     */
    public function import(ImportRequest $importRequest)
    {
        /**
         * process
         */
        $response = $this->daftarProdukRepositories->import($importRequest->file('file'));
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('import', 'import daftar produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
