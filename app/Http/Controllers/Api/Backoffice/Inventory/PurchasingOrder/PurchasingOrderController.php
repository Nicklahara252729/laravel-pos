<?php

namespace App\Http\Controllers\Api\Backoffice\Inventory\PurchasingOrder;

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
use App\Http\Requests\Inventory\PurchasingOrder\StoreRequest;
use App\Http\Requests\Inventory\PurchasingOrder\UpdateRequest;
use App\Http\Requests\Inventory\PurchasingOrder\ImportRequest;
use App\Http\Requests\Inventory\PurchasingOrder\RejectRequest;
use App\Http\Requests\Inventory\PurchasingOrder\UpdateProesPesananRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Inventory\PurchasingOrder\PurchasingOrderRepositories;
use App\Repositories\Log\LogRepositories;

class PurchasingOrderController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    private $purchasingOrderRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        PurchasingOrderRepositories $purchasingOrderRepositories
    ) {
        /**
         * define repositories
         */
        $this->purchasingOrderRepositories = $purchasingOrderRepositories;
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
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->purchasingOrderRepositories->data($uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'purchasing order produk');
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
        $log = $this->outputLogMessage('save', 'purchasing order ' . json_encode($storeRequest->all()));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * save data
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->purchasingOrderRepositories->save($storeRequest->validated(), $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidPo
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidPo, 'purchasing order ' . json_encode($updateRequest->all()), 'purchasing order');

        /**
         * update data process
         */
        $response = $this->purchasingOrderRepositories->update(
            $updateRequest->validated(),
            $uuidPo
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
     * reject data
     */
    public function reject(RejectRequest $rejectRequest, $uuidPo)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('update', $uuidPo, 'reject ' . json_encode($rejectRequest->all()), 'purchasing order');

        /**
         * process
         */
        $response =  $this->purchasingOrderRepositories->reject(
            $rejectRequest->validated(),
            $uuidPo
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
     * get single data
     */
    public function get($uuidPo)
    {
        /**
         * get data process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->purchasingOrderRepositories->get($uuidPo, $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'purchasing order', 'uuid ' . $uuidPo);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'resep');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }

    /**
     * import resep
     */
    public function import(ImportRequest $importRequest)
    {
        /**
         * process
         */
        $response = $this->purchasingOrderRepositories->import($importRequest->file('file'));
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('import', 'import resep');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }


    /**
     * riwayat single data
     */
    public function riwayat($uuidPo)
    {
        /**
         * get data process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->purchasingOrderRepositories->riwayat($uuidPo, $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'purchasing order', 'uuid ' . $uuidPo);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update proses pesanan
     */
    public function updateProsesPesanan(UpdateProesPesananRequest $request, $uuidPo)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('update', $uuidPo, 'update proses pesanan ' . json_encode($request->all()), 'purchasing order');

        /**
         * process
         */
        $response =  $this->purchasingOrderRepositories->updateProsesPesanan(
            $request->validated(),
            $uuidPo
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
     * hentikan pemenuhan
     */
    public function hentikanPemenuhan($uuidPo)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('update', $uuidPo, 'hentikan pemenuhan', 'purchasing order');

        /**
         * process
         */
        $response =  $this->purchasingOrderRepositories->hentikanPemenuhan($uuidPo);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);
        return response()->json($response, $code);
    }
}
