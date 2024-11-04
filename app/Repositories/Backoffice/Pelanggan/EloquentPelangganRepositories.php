<?php

namespace App\Repositories\Backoffice\Pelanggan;

/**
 * import component 
 */

use App\Exceptions\CustomException;
use Maatwebsite\Excel\Facades\Excel;

/**
 * import models
 */

use App\Models\Stakeholder\Customer\Customer;
use App\Models\Transaction\Transaction\Transaction;

/**
 * import traits
 */

use App\Traits\Response;
use App\Traits\Message;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import export collection
 */

use App\Imports\Backoffice\Pelanggan\PelangganImport;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Pelanggan\PelangganRepositories;
use App\Repositories\Backoffice\Outlet\Receipt\EloquentReceiptRepositories;

class EloquentPelangganRepositories implements PelangganRepositories
{

    use Response, Message;

    private $initCheckerHelper;
    private $eloquentReceiptRepositories;
    private $customer;
    private $transaction;

    public function __construct(
        EloquentReceiptRepositories $eloquentReceiptRepositories,
        CheckerHelpers $initCheckerHelper,
        Customer $customer,
        Transaction $transaction
    ) {
        /**
         * defined helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * defined models
         */
        $this->customer = $customer;
        $this->transaction = $transaction;

        /**
         * defined eloquent
         */
        $this->eloquentReceiptRepositories = $eloquentReceiptRepositories;
    }

    /**
     * query for all data
     */
    public function queryAllData($uuidOutlet)
    {
        return $this->customer->select('uuid_customer', 'name')
            ->selectRaw("DATE_FORMAT(created_at, '%d/%m/%Y') AS tgl_bergabung")
            ->selectRaw("(SELECT CASE WHEN total IS NULL THEN 0 ELSE SUM(total) END
            FROM transactions WHERE uuid_customer = customers.uuid_customer) AS total")
            ->where('customers.uuid_outlet', $uuidOutlet)
            ->orderByDesc('id');
    }

    /**
     * query transaction
     */
    public function queryTransaction($uuidPelanggan)
    {
        return $this->transaction->select('uuid_transaction', 'total AS nominal')
            ->selectRaw("DATE_FORMAT(created_at, '%d/%m/%Y') AS tanggal")
            ->selectRaw("(SELECT outlet_name FROM outlets WHERE uuid_outlet = outlets.uuid_outlet) AS outlet")
            ->where('uuid_customer', $uuidPelanggan)
            ->orderByDesc('id');
    }

    /**
     * get data pelanggan
     */
    public function data($uuidOutlet)
    {
        try {

            $data = $this->queryAllData($uuidOutlet)->paginate(10);
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pelanggan'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * import data pelanggan
     */
    public function import($request)
    {
        try {
            $imported = Excel::import(new PelangganImport, $request);

            if (!$imported) :
                throw new \Exception($this->outputMessage('fail import', 'pelanggan'));
            endif;
            $response = $this->sendResponse($this->outputMessage('imported', 'pelanggan'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * get data pelanggan
     */
    public function get($uuidPelanggan)
    {
        try {
            $profile   = $this->customer->select('name', 'email', 'phone', 'gender AS jenkel')
                ->selectRaw("DATE_FORMAT(birthday, '%d/%m/%Y') AS tgl_lahir")
                ->selectRaw("DATE_FORMAT(created_at, '%d/%m/%Y') AS terdaftar")
                ->where('uuid_customer',$uuidPelanggan)
                ->first();

            $sorotan = $this->transaction->selectRaw('COUNT(uuid_customer) AS jumlah_transaksi')
                ->selectRaw("CASE WHEN created_at IS NULL THEN '-' ELSE DATE_FORMAT(MAX(created_at),'%d/%m/%Y') END AS transaksi_terakhir")
                ->selectRaw("CASE WHEN MONTH(created_at) = MONTH(CURRENT_DATE()) AND total IS NOT NULL THEN SUM(total) ELSE 0 END AS total_bulan_ini")
                ->selectRaw("CASE WHEN YEAR(created_at) = YEAR(CURRENT_DATE()) AND total IS NOT NULL THEN SUM(total) ELSE 0 END AS total_tahun_ini")
                ->selectRaw("CASE WHEN total IS NOT NULL THEN SUM(total) ELSE 0 END AS total_pengeluaran")
                ->selectRaw("CASE WHEN total IS NOT NULL THEN AVG(total) ELSE 0 END AS rata_rata")
                ->where('uuid_customer',$uuidPelanggan)
                ->first();

            $transaksi = $this->queryTransaction($uuidPelanggan)->limit(5)->get();
            $data = [
                'profil' => [
                    'nama' => $profile->name,
                    'kontak' => $profile->phone,
                    'email' => $profile->email,
                    'tgl_lahir' => $profile->tgl_lahir,
                    'gender' => $profile->jenkel
                ],
                'sorotan' => [
                    'jumlah_transaksi' => $sorotan->jumlah_transaksi,
                    'terdaftar' => $profile->terdaftar,
                    'transaksi_terakhir' => $sorotan->transaksi_terakhir,
                    'pengeluaran_bulan_ini' => $sorotan->total_bulan_ini,
                    'pengeluaran_tahun_ini' => $sorotan->total_tahun_ini,
                    'total_pengeluaran' => $sorotan->total_pengeluaran,
                    'pengeluaran_rata' => $sorotan->rata_rata
                ],
                'riwayat_transaksi' => $transaksi
            ];

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * receipt data pelanggan
     */
    public function receipt($uuidTransaksi, $uuidOutlet)
    {
        try {
            $data = $this->eloquentReceiptRepositories->queryPreview($uuidOutlet);

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * transaksi data pelanggan
     */
    public function transaksi($uuidPelanggan)
    {
        try {

            $data = $this->queryTransaction($uuidPelanggan)->get();
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'transaksi'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * search data pelanggan
     */
    public function search($nama, $uuidOutlet)
    {
        try {
            $data = $this->queryAllData($uuidOutlet)
                ->where('name', 'like', '%' . $nama . '%')
                ->get();
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pelanggan'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
