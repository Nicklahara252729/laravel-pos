<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\PaketBundle;

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
 use App\Http\Requests\Produk\PaketBundle\StoreRequest;
 use App\Http\Requests\Produk\PaketBundle\UpdateRequest;
 
 /**
  * import repositories
  */
 
 use App\Repositories\Backoffice\Produk\PaketBundle\PaketBundleRepositories;
 use App\Repositories\Log\LogRepositories;

class PaketBundleController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $paketBundleRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        PaketBundleRepositories $paketBundleRepositories
    ) {
        /**
         *  defined repositories
         */
        $this->paketBundleRepositories = $paketBundleRepositories;
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
        $response = $this->paketBundleRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'paket bundle');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidBundlePackage)
    {
        /**
         * process
         */
        $response = $this->paketBundleRepositories->get($uuidBundlePackage);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'paket bundle', 'uuid ' . $uuidBundlePackage);
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
        $log = $this->outputLogMessage('save', 'paket bundle ' . $storeRequest['bundle_name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->paketBundleRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidBundlePackage
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidBundlePackage, json_encode($updateRequest->all()), 'paket bundle');

        /**
         * process
         */
        $response = $this->paketBundleRepositories->update($updateRequest->validated(), $uuidBundlePackage);

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
    public function delete($uuidBundlePackage)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidBundlePackage, null, 'paket bundle');

        /**
         * process
         */
        $response = $this->paketBundleRepositories->delete($uuidBundlePackage);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
