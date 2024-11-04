<?php

namespace App\Http\Controllers\Api\Backoffice\GeneralSettings\GeneralSettings;

/**
 * import component collection
 */

use App\Http\Controllers\Controller;

/**
 * import trait
 */

use App\Traits\Message;

/**
 * import repositories
 */

use App\Repositories\Backoffice\GeneralSettings\GeneralSettings\GeneralSettingsRepositories;
use App\Repositories\Log\LogRepositories;

class GeneralSettingsController extends Controller
{
    use Message;

    private $signature;
    private $logRepositories;
    protected $generalSettingRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        GeneralSettingsRepositories $generalSettingRepositories
    ) {
        /**
         * defined repositories
         */
        $this->generalSettingRepositories = $generalSettingRepositories;
        $this->logRepositories = $logRepositories;
    }

    /**
     * data all record
     */
    public function data()
    {
        /**
         * process
         */
        $response = $this->generalSettingRepositories->data();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'general setting');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * get data general setting
     */
    public function get($param)
    {
        /**
         * process
         */
        $response = $this->generalSettingRepositories->get($param);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'general setting', 'parameter ' . $param);
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
