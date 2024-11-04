<?php

namespace App\Http\Controllers\Api\Backoffice\Ingredient\DaftarBahan;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import trait
 */

use App\Traits\Message;

/**
 * import request
 */

use Illuminate\Http\Request;
use App\Http\Requests\Ingredient\DaftarBahan\StoreRequest;
use App\Http\Requests\Ingredient\DaftarBahan\UpdateRequest;
use App\Http\Requests\Ingredient\DaftarBahan\ImportReplaceRequest;
use App\Http\Requests\Ingredient\DaftarBahan\ImportChangeRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Ingredient\DaftarBahan\DaftarBahanRepositories;
use App\Repositories\Log\LogRepositories;

class DaftarBahanController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $daftarBahanRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        DaftarBahanRepositories $daftarBahanRepositories
    ) {
        /**
         * define repositories
         */
        $this->daftarBahanRepositories = $daftarBahanRepositories;
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
     * show all record
     */
    public function data()
    {
        /**
         * get data process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarBahanRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'daftar bahan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * save data
     */
    public function save(StoreRequest $storeRequest)
    {
        /**
         * save log
         */
        $log = $this->outputLogMessage('save', 'daftar bahan ' . json_encode($storeRequest->all()));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * save data
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarBahanRepositories->save($storeRequest->validated(), $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidIngredientLibrary
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidIngredientLibrary, 'daftar bahan ' . json_encode($updateRequest->all()), 'daftar bahan');

        /**
         * update data process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarBahanRepositories->update(
            $updateRequest->validated(),
            $uuidIngredientLibrary,
            $uuid_outlet
        );
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * delete data
     */
    public function delete($uuidIngredientLibrary)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidIngredientLibrary, null, 'daftar bahan');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response =  $this->daftarBahanRepositories->delete($uuidIngredientLibrary, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidIngredientLibrary)
    {
        /**
         * get data process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarBahanRepositories->get($uuidIngredientLibrary, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'daftar bahan', 'uuid ' . $uuidIngredientLibrary);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'daftar bahan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }

    /**
     * import replace daftar bahan
     */
    public function importReplace(ImportReplaceRequest $importRequest)
    {
        /**
         * process
         */
        $response = $this->daftarBahanRepositories->importReplace($importRequest->file('file'));
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('import', 'import replace daftar bahan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * import change daftar bahan
     */
    public function importChange(ImportChangeRequest $importRequest)
    {
        /**
         * process
         */
        $response = $this->daftarBahanRepositories->importChange($importRequest->file('file'));
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('import', 'import change daftar bahan');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
