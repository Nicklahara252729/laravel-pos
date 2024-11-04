<?php

namespace App\Http\Controllers\Api\Backoffice\Pembayaran\Invoice;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import request
 */
use Illuminate\Http\Request;
use App\Http\Requests\Pembayaran\Invoice\UpdateRequest;
use App\Http\Requests\Pembayaran\Invoice\CancelRequest;

/**
 * import traits
 */

use App\Traits\Message;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Pembayaran\Invoice\InvoiceRepositories;
use App\Repositories\Log\LogRepositories;

class InvoiceController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    private $invoiceRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        InvoiceRepositories $invoiceRepositories
    ) {
        /**
         * defined repositories
         */
        $this->invoiceRepositories = $invoiceRepositories;
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
     * get data invoice
     */
    public function data()
    {
        /**
         * process
         */
        $response = $this->invoiceRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'invoice');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidInvoice)
    {
        /**
         * process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->invoiceRepositories->get($uuidInvoice, $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'invoice', 'uuid ' . $uuidInvoice);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidInvoice
    ) {
        /**
         * set log 
         */
        $request = $updateRequest->validated();
        $log = $this->outputLogMessage('update', $uuidInvoice, json_encode($request), 'invoice');

        /**
         * process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->invoiceRepositories->update($request, $uuidInvoice, $uuidOutlet);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * resend data
     */
    public function resend($uuidInvoice)
    {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidInvoice, 'resend', 'invoice');

        /**
         * process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->invoiceRepositories->resend($uuidInvoice, $uuidOutlet);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * cancel data
     */
    public function cancel(
        CancelRequest $cancelRequest,
        $uuidInvoice
    ) {
        /**
         * set log 
         */
        $request = $cancelRequest->validated();
        $log = $this->outputLogMessage('update', $uuidInvoice, json_encode($request), 'invoice');

        /**
         * process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->invoiceRepositories->update($request, $uuidInvoice, $uuidOutlet);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * export data transaksi
     */
    public function exportTransaksi($uuidInvoice)
    {
        $message = $this->outputLogMessage('export', 'invoice transaksi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidInvoice))->download('Ringkasan-Laporan.xlsx');
        return $uuidInvoice;
    }

    /**
     * export data detail
     */
    public function exportDetail($uuidInvoice)
    {
        $message = $this->outputLogMessage('export', 'invoice detail');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidInvoice))->download('Ringkasan-Laporan.xlsx');
        return $uuidInvoice;
    }
}
