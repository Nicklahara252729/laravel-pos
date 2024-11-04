<?php

namespace App\Http\Controllers\Api\Backoffice\Pegawai\PinAkses;

/**
 * import components 
 */

use App\Http\Controllers\Controller;

/**
 * import trait
 */

use App\Traits\Message;

/**
 * import form request
 */

use Illuminate\Http\Request;
use App\Http\Requests\Pegawai\PinAkses\UpdateRequest;

/**
 * import reposiotories
 */

use App\Repositories\Backoffice\Pegawai\PinAkses\PinAksesRepositories;
use App\Repositories\Log\LogRepositories;

class PinAksesController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $pinAksesRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        PinAksesRepositories $pinAksesRepositories
    ) {
        /**
         * define repositories
         */
        $this->pinAksesRepositories = $pinAksesRepositories;
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
     * get eligible users list
     */
    public function data()
    {
        /**
         * proces
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pinAksesRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'pin akses');
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
        $response = $this->pinAksesRepositories->get($uuid_user, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'pin akses', 'uuid user ' . $uuid_user);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }


    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_user
    ) {

        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_user, json_encode($updateRequest->all()), 'pin akses');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->pinAksesRepositories->update($updateRequest->validated(), $uuid_user, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);
        return response()->json($response, $code);
    }
}
