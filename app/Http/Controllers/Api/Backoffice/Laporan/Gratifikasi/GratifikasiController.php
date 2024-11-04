<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\Gratifikasi;

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

use App\Repositories\Backoffice\Laporan\Gratifikasi\GratifikasiRepositories;
use App\Repositories\Log\LogRepositories;

class GratifikasiController extends Controller
{
    use Message;

    private $logRepositories;
    private $gratifikasiRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        GratifikasiRepositories $gratifikasiRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->gratifikasiRepositories = $gratifikasiRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data pajak
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->gratifikasiRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan gratifikasi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan gratifikasi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
