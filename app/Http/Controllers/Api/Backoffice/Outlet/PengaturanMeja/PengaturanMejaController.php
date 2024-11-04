<?php

namespace App\Http\Controllers\Api\Backoffice\Outlet\PengaturanMeja;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import form request
 */

use Illuminate\Http\Request;
use App\Http\Requests\Outlet\PengaturanMeja\StoreRequest;
use App\Http\Requests\Outlet\PengaturanMeja\UpdateRequest;

/**
 * import traits
 */

use App\Traits\Message;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Outlet\PengaturanMeja\PengaturanMejaRepositories;
use App\Repositories\Log\LogRepositories;

class PengaturanMejaController extends Controller
{
    use Message;

    private $outlet;
    private $logRepositories;
    private $pengaturanMejaRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        PengaturanMejaRepositories $pengaturanMejaRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->pengaturanMejaRepositories = $pengaturanMejaRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;

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
     * get data group meja
     */
    public function groupMejaData()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $search = !empty($this->request->get('search')) ? explode('-', $this->request->get('search')) : null;
        $response = $this->pengaturanMejaRepositories->groupMejaData($date, $search);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'pengaturan meja');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data group meja
     */
    public function groupMejaGet($uuidTable)
    {
        /**
         * process
         */
        $response = $this->pengaturanMejaRepositories->groupMejaGet($uuidTable);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'group meja', 'uuid ' . $uuidTable);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * save data group meja
     */
    public function groupMejaSave(StoreRequest $request)
    {
        /**
         * process
         */
        $request = $request->validated();
        $response   = $this->pengaturanMejaRepositories->groupMejaSave($request);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $log = $this->outputLogMessage('save', 'group meja ' . json_encode($request));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update data group meja
     */
    public function groupMejaUpdate(UpdateRequest $request, $uuidOutlet)
    {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidOutlet, 'group meja ' . json_encode($request->all()), 'pengaturan meja');

        /**
         * process
         */
        $request = $request->validated();
        $response   = $this->pengaturanMejaRepositories->groupMejaUpdate($request, $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * duplicate data group meja
     */
    public function groupMejaDuplicate($uuidOutlet)
    {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidOutlet, 'duplikat meja ', 'pengaturan meja');

        /**
         * process
         */
        $response   = $this->pengaturanMejaRepositories->groupMejaDuplicate($uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update pengaturan meja
     */
    public function groupMejaAturMeja($uuidOutlet)
    {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidOutlet, 'atur meja ', 'pengaturan meja');

        /**
         * process
         */
        $response   = $this->pengaturanMejaRepositories->groupMejaAturMeja($uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * delete data group meja
     */
    public function groupMejaDelete($uuidTable)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidTable, null, 'group meja');

        /**
         * process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response =  $this->pengaturanMejaRepositories->groupMejaDelete($uuidTable, $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get total laporan
     */
    public function laporanTotal()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->pengaturanMejaRepositories->laporanTotal($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'total pengaturan meja');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get data laporan
     */
    public function laporanData()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $search = !empty($this->request->get('search')) ? explode('-', $this->request->get('search')) : null;
        $response = $this->pengaturanMejaRepositories->laporanData($date, $search);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'pengaturan meja');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get laporan transaksi
     */
    public function laporanTransaksi($uuidTable)
    {
        /**
         * process
         */
        $response = $this->pengaturanMejaRepositories->laporanTransaksi($uuidTable);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'detail item', 'uuid ' . $uuidTable);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get laporan voide
     */
    public function laporanVoid($uuidOutlet)
    {
        /**
         * process
         */
        $response = $this->pengaturanMejaRepositories->laporanVoid($uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'void item', 'uuid outlet ' . $uuidOutlet);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export laporan
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'pengaturan meja');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
