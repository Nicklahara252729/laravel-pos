<?php

namespace App\Http\Controllers\Api\Backoffice\Laporan\PenjualanProduk;

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

use App\Repositories\Backoffice\Laporan\PenjualanProduk\PenjualanProdukRepositories;
use App\Repositories\Log\LogRepositories;

class PenjualanProdukController extends Controller
{
    use Message;

    private $logRepositories;
    private $penjualanProdukRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        PenjualanProdukRepositories $penjualanProdukRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->penjualanProdukRepositories = $penjualanProdukRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get data incom penjualan produk
     */
    public function dataIncome()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->penjualanProdukRepositories->dataIncome($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan income penjualan produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get data quantity penjualan produk
     */
    public function dataQuantity()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-', $this->request->get('date')) : null;
        $response = $this->penjualanProdukRepositories->dataQuantity($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'laporan quantity penjualan produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data ringkasan barang
     */
    public function exportRingkasanBarang($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan ringkasan penjualan barang');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }

    /**
     * export data perjam terjual
     */
    public function exportPerjamTerjual($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan per jam terjual');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }

    /**
     * export data jumlah perjam
     */
    public function exportJumlahPerjam($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'laporan jumlah yang terjual laporan per jam');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }
}
