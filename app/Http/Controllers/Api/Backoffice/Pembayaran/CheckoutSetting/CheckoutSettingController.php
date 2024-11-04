<?php

namespace App\Http\Controllers\Api\Backoffice\Pembayaran\CheckoutSetting;

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
use App\Http\Requests\Pembayaran\CheckoutSetting\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Pembayaran\CheckoutSetting\CheckoutSettingRepositories;
use App\Repositories\Log\LogRepositories;

class CheckoutSettingController extends Controller
{
    use Message;

    private $outlet;
    private $request;
    private $logRepositories;
    protected $checkoutSettingRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        CheckoutSettingRepositories $checkoutSettingRepositories
    ) {
        /**
         * define repositories
         */
        $this->checkoutSettingRepositories = $checkoutSettingRepositories;
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
     * get single data
     */
    public function get($uuid_outlet)
    {
        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->checkoutSettingRepositories->get($uuid_outlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'checkout setting', 'uuid ' . $uuid_outlet);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update data
     */
    public function update(
        UpdateRequest $updateRequest,
        $uuid_outlet
    ) {
        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuid_outlet, json_encode($updateRequest->all()), 'checkout setting');

        /**
         * process
         */
        $uuid_outlet = $this->uuidOutlet();
        $response = $this->checkoutSettingRepositories->update(
            $updateRequest->validated(),
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
