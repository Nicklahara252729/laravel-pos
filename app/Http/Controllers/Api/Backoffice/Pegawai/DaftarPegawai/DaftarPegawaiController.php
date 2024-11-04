<?php

namespace App\Http\Controllers\Api\Backoffice\Pegawai\DaftarPegawai;

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
use App\Http\Requests\Pegawai\DaftarPegawai\StoreRequest;
use App\Http\Requests\Pegawai\DaftarPegawai\UpdateRequest;
use App\Http\Requests\Pegawai\DaftarPegawai\UpdatePasswordRequest;
use App\Http\Requests\Pegawai\DaftarPegawai\ImportRequest;

/**
 * import export collection
 */
use App\Exports\Backoffice\Pegawai\DaftarPegawai\DaftarPegawaiExport;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Pegawai\DaftarPegawai\DaftarPegawaiRepositories;
use App\Repositories\Backoffice\Profile\Akun\AkunRepositories;
use App\Repositories\Log\LogRepositories;

class DaftarPegawaiController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $daftarPegawaiRepositories;
    protected $akunRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        DaftarPegawaiRepositories $daftarPegawaiRepositories,
        AkunRepositories $akunRepositories
    ) {
        /**
         * defined repositories
         */
        $this->daftarPegawaiRepositories = $daftarPegawaiRepositories;
        $this->akunRepositories = $akunRepositories;
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
    public function data($status)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarPegawaiRepositories->data($status, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'daftar pegawai');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuid_user)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->daftarPegawaiRepositories->get($uuid_user, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'daftar pegawai', 'uuid ' . $uuid_user);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(UpdateRequest $updateRequest, $uuid_user)
    {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_user, 'daftar pegawai ' . $updateRequest['name'], 'daftar pegawai');

        /**
         * process update
         */
        $uuid_outlet = $this->uuidOutlet();
        $response   = $this->daftarPegawaiRepositories->update($updateRequest->validated(), $uuid_user, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * save data
     */
    public function save(StoreRequest $storeRequest)
    {
        /**
         * process
         */
        $response   = $this->daftarPegawaiRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $log = $this->outputLogMessage('save', 'daftar pegawai ' . $storeRequest['name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * delete data
     */
    public function delete($uuid_user)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuid_user, null, 'daftar pegawai');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response   = $this->daftarPegawaiRepositories->delete($uuid_user, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * delete permanent data
     */
    public function deletePermanent($uuid_user)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete permanent', $uuid_user, null, 'daftar pegawai');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response   = $this->daftarPegawaiRepositories->deletePermanent($uuid_user, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * restore data
     */
    public function restore($uuid_user)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('restore', 'daftar pegawai', 'uuid ' . $uuid_user);

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response   = $this->daftarPegawaiRepositories->restore($uuid_user, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update password
     */
    public function updatePassword(
        UpdatePasswordRequest $updatePasswordRequest,
        $uuid_user
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('change password', $uuid_user);

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response   = $this->akunRepositories->ubahPassword($updatePasswordRequest->validated(), $uuid_user, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * export data
     */
    public function export($uuidOutlet)
    { 
        $message = $this->outputLogMessage('export', 'daftar pegawai');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return (new DaftarPegawaiExport($uuidOutlet))->download('Daftar-Pegawai.xlsx');
    }

    /**
     * import data
     */
    public function import(ImportRequest $importRequest)
    {
        /**
         * process
         */
        $response = $this->daftarPegawaiRepositories->import($importRequest->file('file'));
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('import', 'daftar pegawai');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
        
    }
}
