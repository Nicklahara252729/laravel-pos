<?php

namespace App\Http\Controllers\Api\Backoffice\Inventory\RingkasanInventory;

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

use App\Repositories\Backoffice\Inventory\RingkasanInventory\RingkasanInventoryRepositories;
use App\Repositories\Log\LogRepositories;

class RingkasanInventoryController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    private $ringkasanInventoryRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        RingkasanInventoryRepositories $ringkasanInventoryRepositories,
        Request $request,
    ) {
        /**
         * defined repositories
         */
        $this->ringkasanInventoryRepositories = $ringkasanInventoryRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * static variable
         */
        $this->outlet = $request->header('outlet');
    }

    /**
     * set uuid outlet
     */
    private function uuidOutlet()
    {
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $this->outlet;
    }

    /**
     * get data metode pembayaran
     */
    public function data()
    {
        /**
         * process
         */
        $response = $this->ringkasanInventoryRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'ringkasan inventory');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'ringkasan inventori');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
