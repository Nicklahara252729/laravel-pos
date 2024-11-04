<?php

namespace App\Http\Controllers\Api\Backoffice\RiwayatTransaksi;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import form request
 */
use Illuminate\Http\Request;
use App\Http\Requests\RiwayatTransaksi\IssueRefundRequest;
use App\Http\Requests\RiwayatTransaksi\ResendReceiptRequest;

/**
 * import traits
 */

use App\Traits\Message;

/**
 * import repositories
 */

use App\Repositories\Backoffice\RiwayatTransaksi\RiwayatTransaksiRepositories;
use App\Repositories\Log\LogRepositories;

class RiwayatTransaksiController extends Controller
{
    use Message;

    private $logRepositories;
    private $riwayatTransaksiRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        RiwayatTransaksiRepositories $riwayatTransaksiRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->riwayatTransaksiRepositories = $riwayatTransaksiRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data total
     */
    public function total()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->riwayatTransaksiRepositories->total($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'total riwayat transaksi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get data riwayat transaksi
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $search = !empty($this->request->get('search')) ? explode('-', $this->request->get('search')) : null;
        $response = $this->riwayatTransaksiRepositories->data($date,$search);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'riwayat transaksi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data transaksi
     */
    public function exportTransaksi($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'riwayat transaksi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }

    /**
     * export data item detail
     */
    public function exportItemDetail($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'riwayat transaksi item detail');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }

    /**
     * get single data for detail
     */
    public function get($uuidTransaksi,$uuidOutlet)
    {
        /**
         * process
         */
        $response = $this->riwayatTransaksiRepositories->get($uuidTransaksi, $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'detail item', 'uuid ' . $uuidTransaksi);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * resend receipt
     */
    public function resendReceipt(ResendReceiptRequest $request)
    {
        /**
         * process
         */
        $request = $request->validated();
        $response   = $this->riwayatTransaksiRepositories->resendReceipt($request);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $log = $this->outputLogMessage('save', 'resend receipt ' . json_encode($request));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * issue refund
     */
    public function issueRefund(IssueRefundRequest $request)
    {
        /**
         * process
         */
        $request = $request->validated();
        $response   = $this->riwayatTransaksiRepositories->issueRefund($request);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $log = $this->outputLogMessage('save', 'issue refund ' . json_encode($request));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get item
     */
    public function item($uuidTransaksi,$uuidOutlet)
    {
        /**
         * process
         */
        $response = $this->riwayatTransaksiRepositories->item($uuidTransaksi, $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'item', 'uuid ' . $uuidTransaksi);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
