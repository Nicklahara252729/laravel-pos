<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\RingkasanLaporan;

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
 * import repositories
 */

use App\Repositories\Backoffice\Laporan\RingkasanLaporan\RingkasanLaporanRepositories;
use App\Repositories\Log\LogRepositories;

class RingkasanLaporanController extends Controller
{
    use Message;

    private $logRepositories;
    private $ringkasanLaporanRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        RingkasanLaporanRepositories $ringkasanLaporanRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->ringkasanLaporanRepositories = $ringkasanLaporanRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data ringkasan laporan
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->ringkasanLaporanRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan ringkasan laporan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'ringkasan laporan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
