<?php

namespace App\Http\Controllers\Api\Backoffice\Ingredient\KategoriBahan;

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
use App\Http\Requests\Ingredient\KategoriBahan\StoreRequest;
use App\Http\Requests\Ingredient\KategoriBahan\UpdateRequest;
use App\Http\Requests\Ingredient\KategoriBahan\AssignItemRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Ingredient\KategoriBahan\KategoriBahanRepositories;
use App\Repositories\Log\LogRepositories;

class KategoriBahanController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    private $kategoriBahanRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        KategoriBahanRepositories $kategoriBahanRepositories
    ) {
        /**
         * define repositories
         */
        $this->kategoriBahanRepositories = $kategoriBahanRepositories;
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
         * get data process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriBahanRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'kategori bahan');
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
        $log = $this->outputLogMessage('save', 'kategori bahan ' . json_encode($storeRequest->all()));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * save data
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriBahanRepositories->save($storeRequest->validated(), $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_ingredient_category
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_ingredient_category, 'kategori bahan ' . json_encode($updateRequest->all()), 'kategori bahan');

        /**
         * update data process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriBahanRepositories->update(
            $updateRequest->validated(),
            $uuid_ingredient_category,
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
    public function delete($uuid_ingredient_category)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuid_ingredient_category, null, 'kategori bahan');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response =  $this->kategoriBahanRepositories->delete($uuid_ingredient_category, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuid_ingredient_category)
    {
        /**
         * get data process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriBahanRepositories->get($uuid_ingredient_category, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'kategori bahan', 'uuid ' . $uuid_ingredient_category);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * assign produk
     */
    public function assignItem(
        AssignItemRequest $request,
        $uuid_ingredient_category
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_ingredient_category, json_encode($request->all()), 'assign item');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->kategoriBahanRepositories->assignItem(
            $request->validated(),
            $uuid_ingredient_category,
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
