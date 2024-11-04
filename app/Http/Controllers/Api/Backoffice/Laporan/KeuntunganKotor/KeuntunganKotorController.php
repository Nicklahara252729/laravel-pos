<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\KeuntunganKotor;

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

use App\Repositories\Backoffice\Laporan\KeuntunganKotor\KeuntunganKotorRepositories;
use App\Repositories\Log\LogRepositories;

class KeuntunganKotorController extends Controller
{
    use Message;

    private $logRepositories;
    private $keuntunganKotorRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        KeuntunganKotorRepositories $keuntunganKotorRepositories,
        Request $request
    ) {
        /**
         * defiend repositories
         */
        $this->keuntunganKotorRepositories = $keuntunganKotorRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data keutungan kotor
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->keuntunganKotorRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan keuntungan kotor');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan keuntungan kotor');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
