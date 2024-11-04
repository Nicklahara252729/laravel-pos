<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\TipePenjualan;

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

use App\Repositories\Backoffice\Laporan\TipePenjualan\TipePenjualanRepositories;
use App\Repositories\Log\LogRepositories;

class TipePenjualanController extends Controller
{
    use Message;

    private $logRepositories;
    private $tipePenjualanRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        TipePenjualanRepositories $tipePenjualanRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->tipePenjualanRepositories = $tipePenjualanRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data tipe penjualan
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->tipePenjualanRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan tipe penjualan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan tipe penjualan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
