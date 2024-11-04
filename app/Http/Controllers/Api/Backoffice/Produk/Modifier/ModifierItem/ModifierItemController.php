<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\Modifier\ModifierItem;

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
use App\Http\Requests\Produk\Modifier\ModifierItem\StoreRequest;
use App\Http\Requests\Produk\Modifier\ModifierItem\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\Modifier\ModifierItem\ModifierItemRepositories;
use App\Repositories\Log\LogRepositories;

class ModifierItemController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $modifierItemRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        ModifierItemRepositories $modifierItemRepositories
    ) {
        /**
         *  defined repositories
         */
        $this->modifierItemRepositories = $modifierItemRepositories;
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
    public function data($uuidModifier)
    {

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierItemRepositories->data($uuidModifier, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'modifier item');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get single data
     */
    public function get($uudiModifierItem)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierItemRepositories->get($uudiModifierItem, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'modifier item', 'uuid ' . $uudiModifierItem);
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
        $log = $this->outputLogMessage('save', 'modifier item');
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->modifierItemRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidModifierItem
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidModifierItem, json_encode($updateRequest->all()), 'modifier item');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierItemRepositories->update($updateRequest->validated(), $uuidModifierItem, $uuid_outlet);

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
    public function delete($uuidModifierItem)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidModifierItem, null, 'modifier item');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierItemRepositories->delete($uuidModifierItem, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
