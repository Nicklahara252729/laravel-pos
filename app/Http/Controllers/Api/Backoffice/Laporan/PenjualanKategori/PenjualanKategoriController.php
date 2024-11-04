<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\PenjualanKategori;

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
use App\Repositories\Backoffice\Laporan\PenjualanKategori\PenjualanKategoriRepositories;
use App\Repositories\Log\LogRepositories;

class PenjualanKategoriController extends Controller
{
    use Message;

    private $logRepositories;
    private $penjualanKategoriRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        PenjualanKategoriRepositories $penjualanKategoriRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->penjualanKategoriRepositories = $penjualanKategoriRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data penjualan kategori
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->penjualanKategoriRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan penjualan kategori');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan penjualan kategori');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
