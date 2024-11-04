<?php

namespace App\Http\Controllers\Api\Backoffice\GeneralSettings\GeneralSettingAssign;

/**
 * import component
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * import trait
 */

use App\Traits\Message;

/**
 * import form request
 */

use App\Http\Requests\GeneralSettings\GeneralSettingAssign\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\GeneralSettings\GeneralSettingAssign\GeneralSettingAssignRepositories;
use App\Repositories\Log\LogRepositories;

class GeneralSettingAssignController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $generalSettingAssignRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        GeneralSettingAssignRepositories $generalSettingAssignRepositories
    ) {
        /**
         * defined repositories
         */
        $this->generalSettingAssignRepositories = $generalSettingAssignRepositories;
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
     * data all record
     */
    public function data()
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->generalSettingAssignRepositories->data($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'general setting assign');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get data general setting
     */
    public function get($uuid_general_setting)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->generalSettingAssignRepositories->get(
            $uuid_outlet,
            $uuid_general_setting
        );
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'general setting assign', 'uuid outlet' . $uuid_outlet . ' dan uuid general setting ' . $uuid_general_setting);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update data general setting
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_general_setting_assign
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_general_setting_assign, 'setting status' . $updateRequest['setting_status'], 'general setting assign');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->generalSettingAssignRepositories->update(
            $updateRequest->validated(),
            $uuid_general_setting_assign,
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
}
