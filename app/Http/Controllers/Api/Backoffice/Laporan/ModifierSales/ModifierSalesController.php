<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\ModifierSales;

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

use App\Repositories\Backoffice\Laporan\ModifierSales\ModifierSalesRepositories;
use App\Repositories\Log\LogRepositories;


class ModifierSalesController extends Controller
{
    use Message;

    private $logRepositories;
    private $modifierSalesRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        ModifierSalesRepositories $modifierSalesRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->modifierSalesRepositories = $modifierSalesRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data modifier sales
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->modifierSalesRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan modifier sales');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan modifier sales');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
