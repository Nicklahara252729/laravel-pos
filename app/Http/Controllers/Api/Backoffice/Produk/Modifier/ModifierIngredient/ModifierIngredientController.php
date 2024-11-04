<?php

namespace App\Http\Controllers\Api\Backoffice\Produk\Modifier\ModifierIngredient;

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
use App\Http\Requests\Produk\Modifier\ModifierIngredient\StoreRequest;
use App\Http\Requests\Produk\Modifier\ModifierIngredient\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Produk\Modifier\ModifierIngredient\ModifierIngredientRepositories;
use App\Repositories\Log\LogRepositories;

class ModifierIngredientController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $modifierIngredientRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        ModifierIngredientRepositories $modifierIngredientRepositories
    ) {
        /**
         *  defined repositories
         */
        $this->modifierIngredientRepositories = $modifierIngredientRepositories;
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
        $response = $this->modifierIngredientRepositories->data($uuidModifier, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'modifier ingredient');
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
        $response = $this->modifierIngredientRepositories->get($uudiModifierItem, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'modifier ingredient', 'uuid ' . $uudiModifierItem);
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
        $log = $this->outputLogMessage('save', 'modifier ingredient');
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        /**
         * process
         */
        $response = $this->modifierIngredientRepositories->save($storeRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuidModifierIngredientItem
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidModifierIngredientItem, json_encode($updateRequest->all()), 'modifier ingredient');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierIngredientRepositories->update($updateRequest->validated(), $uuidModifierIngredientItem, $uuid_outlet);

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
    public function delete($uuidModifierIngredientItem)
    {
        /**
         * set log
         */
        $log = $this->outputLogMessage('delete', $uuidModifierIngredientItem, null, 'modifier ingredient');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->modifierIngredientRepositories->delete($uuidModifierIngredientItem, $uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
