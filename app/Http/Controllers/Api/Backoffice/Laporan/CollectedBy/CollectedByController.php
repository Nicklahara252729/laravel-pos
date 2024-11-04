<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\CollectedBy;

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

use App\Repositories\Backoffice\Laporan\CollectedBy\CollectedByRepositories;
use App\Repositories\Log\LogRepositories;

class CollectedByController extends Controller
{
    use Message;

    private $logRepositories;
    private $collectedByRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        CollectedByRepositories $collectedByRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->collectedByRepositories = $collectedByRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data collected by
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->collectedByRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan collected by');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan collected by');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
