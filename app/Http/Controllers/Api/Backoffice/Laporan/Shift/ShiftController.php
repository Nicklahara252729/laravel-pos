<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\Shift;

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

use App\Repositories\Backoffice\Laporan\Shift\ShiftRepositories;
use App\Repositories\Log\LogRepositories;

class ShiftController extends Controller
{
    use Message;

    private $logRepositories;
    private $shiftRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        ShiftRepositories $shiftRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->shiftRepositories = $shiftRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data shift
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->shiftRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan shift');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($jenisExport, $uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan shift');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $jenisExport . '/' . $uuidOutlet;
    }
}
