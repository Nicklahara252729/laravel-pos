<?php

namespace App\Http\Controllers\Api\Backoffice\Ingredient\Resep;

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
use App\Http\Requests\Ingredient\Resep\StoreRequest;
use App\Http\Requests\Ingredient\Resep\UpdateRequest;
use App\Http\Requests\Ingredient\Resep\ImportRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Ingredient\Resep\ResepRepositories;
use App\Repositories\Log\LogRepositories;

class ResepController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    private $resepRepositories;

    public function __construct(     
        Request $request,   
        LogRepositories $logRepositories,
        ResepRepositories $resepRepositories
    ) {
        /**
         * define repositories
         */
        $this->resepRepositories = $resepRepositories;
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
     * show all record recipe product
     */
    public function dataProduk()
    {
        /**
         * get data process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->resepRepositories->dataProduk($uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'daftar bahan produk');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * show all record recipe half raw
     */
    public function dataHalfRaw()
    {
        /**
         * get data process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->resepRepositories->dataHalfRaw($uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'daftar bahan setenga jadi');
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
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->resepRepositories->save($storeRequest->validated(), $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidRecipe
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidRecipe, 'daftar bahan ' . json_encode($updateRequest->all()), 'daftar bahan');

        /**
         * update data process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->resepRepositories->update(
            $updateRequest->validated(),
            $uuidRecipe,
            $uuidOutlet
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
    public function delete($uuidRecipe)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidRecipe, null, 'daftar bahan');

        /**
         * process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response =  $this->resepRepositories->delete($uuidRecipe, $uuidOutlet);
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
    public function get($uuidRecipe)
    {
        /**
         * get data process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->resepRepositories->get($uuidRecipe, $uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'daftar bahan', 'uuid ' . $uuidRecipe);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    {
        $message = $this->outputLogMessage('export', 'resep');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        // return (new DaftarPegawaiExport($uuidOutlet))->download('Ringkasan-Laporan.xlsx');
        return $uuidOutlet;
    }

    /**
     * import resep
     */
    public function import(ImportRequest $importRequest)
    {
        /**
         * process
         */
        $response = $this->resepRepositories->import($importRequest->file('file'));
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('import', 'import resep');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
