<?php

namespace App\Http\Controllers\Api\Backoffice\Pelanggan;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import request
 */

use Illuminate\Http\Request;
use App\Http\Requests\Pelanggan\ImportRequest;

/**
 * import traits
 */

use App\Traits\Message;

/**
 * import export collection
 */
use App\Exports\Backoffice\Pelanggan\PelangganExport;

/**
 * import repoitories
 */

use App\Repositories\Backoffice\Pelanggan\PelangganRepositories;
use App\Repositories\Log\LogRepositories;

class PelangganController extends Controller
{
    use Message;

    private $request;
    private $outlet;
    private $logRepositories;
    private $pelangganRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        PelangganRepositories $pelangganRepositories
    ) {
        /**
         * defined repositories
         */
        $this->pelangganRepositories = $pelangganRepositories;
        $this->logRepositories = $logRepositories;


        /**
         * static variable
         */
        $this->outlet = $request->header('outlet');
        $this->request = $request;
    }

    /**
     * set uuid outlet
     */
    private function uuidOutlet()
    {
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $this->outlet;
    }

    /**
     * data pelanggan
     */
    public function data()
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pelangganRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'pelanggan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data pelanggan
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'pelanggan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return (new PelangganExport($uuidOutlet))->download('Pelanggan.xlsx');
    }

    /**
     * import data pelanggan
     */
    public function import(ImportRequest $importRequest)
    {
        /**
         * process
         */
        $response = $this->pelangganRepositories->import($importRequest->file('file'));
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('import', 'import data pelanggan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidPelanggan)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pelangganRepositories->get($uuidPelanggan, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'pelanggan', 'uuid ' . $uuidPelanggan);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * receipt transaksi pelanggan
     */
    public function receipt($uuidTransaksi)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pelangganRepositories->receipt($uuidTransaksi, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'receipt', 'uuid ' . $uuidTransaksi);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * data transaksi pelanggan
     */
    public function transaksi($uuidPelanggan)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pelangganRepositories->transaksi($uuidPelanggan, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'transaksi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * pencarian pelanggan
     */
    public function search()
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $nama        = $this->request->get('nama');
        $response    = $this->pelangganRepositories->search($nama, $uuid_outlet);
        $code        = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('search', 'pelanggan', $nama);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
