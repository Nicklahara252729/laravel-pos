<?php

namespace App\Http\Controllers\Api\Backoffice\Pegawai\Akses;

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
use App\Http\Requests\Pegawai\Akses\StoreRequest;
use App\Http\Requests\Pegawai\Akses\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Pegawai\Akses\AksesRepositories;
use App\Repositories\Log\LogRepositories;

class AksesController extends Controller
{
    use Message;
    
    private $logRepositories;
    private $outlet;
    private $request;
    protected $aksesRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        AksesRepositories $aksesRepositories
    ) {
        /**
         * defined repositories
         */
        $this->aksesRepositories = $aksesRepositories;
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
     * get all record
     */
    public function data()
    {
        //load data from repositories
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->aksesRepositories->data($uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'akses');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuid_access)
    {
        //process data from database
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->aksesRepositories->get($uuid_access,$uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'akses', 'uuid ' . $uuid_access);
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
        $log = $this->outputLogMessage('save', 'akses ' . json_encode($storeRequest->all()));
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->aksesRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        //response
        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_access
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_access, 'akses ' . json_encode($updateRequest->all()), 'akses');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->aksesRepositories->update($updateRequest->validated(), $uuid_access, $uuid_outlet);
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
    public function delete($uuid_access)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuid_access, null, 'akses');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->aksesRepositories->delete($uuid_access, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);
        
        return response()->json($response, $code);
    }
}
