<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\MetodePembayaran;

/**
 * import component
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * import traits
 */
use App\Traits\Message;

/**
 * import repoitories
 */
use App\Repositories\Backoffice\Laporan\MetodePembayaran\MetodePembayaranRepositories;
use App\Repositories\Log\LogRepositories;

class MetodePembayaranController extends Controller
{
    use Message;

    private $logRepositories;
    private $metodePembayaranRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        MetodePembayaranRepositories $metodePembayaranRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->metodePembayaranRepositories = $metodePembayaranRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data metode pembayaran
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->metodePembayaranRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan metode pembayaran');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan metode pembayaran');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
