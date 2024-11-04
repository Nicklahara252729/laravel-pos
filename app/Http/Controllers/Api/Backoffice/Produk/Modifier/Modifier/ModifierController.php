<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\Modifier\Modifier;

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
use App\Http\Requests\Produk\Modifier\Modifier\StoreRequest;
use App\Http\Requests\Produk\Modifier\Modifier\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\Modifier\Modifier\ModifierRepositories;
use App\Repositories\Log\LogRepositories;

class ModifierController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $modifierRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        ModifierRepositories $modifierRepositories
    ) {
        /**
         *  defined repositories
         */
        $this->modifierRepositories = $modifierRepositories;
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

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'modifier');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uuidModifier)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierRepositories->get($uuidModifier, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'modifier', 'uuid ' . $uuidModifier);
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
        $log = $this->outputLogMessage('save', 'modifier ' . $storeRequest['modifier_name']);
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->modifierRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidModifier
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidModifier, json_encode($updateRequest->all()), 'modifier');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierRepositories->update($updateRequest->validated(), $uuidModifier, $uuid_outlet);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * delete data
     */
    public function delete($uuidModifier)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidModifier, null, 'modifier');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierRepositories->delete($uuidModifier, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
