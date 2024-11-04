<?php

namespace App\Http\Controllers\Api\Auth\Logout;

/**
 * import component collection
 */

use App\Http\Controllers\Controller;

/**
 * import repositories
 */

use App\Repositories\Auth\Logout\LogoutRepositories;
use App\Repositories\Log\LogRepositories;

class LogoutController extends Controller
{
    protected $logoutRepositories;
    private $logRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        LogoutRepositories $logoutRepositories
    ) {
        /**
         * defined repositories
         */
        $this->logoutRepositories = $logoutRepositories;
        $this->logRepositories = $logRepositories;
    }
    /**
     * logout
     */
    public function logout()
    {
        /**
         * process
         */
        $response = $this->logoutRepositories->logout();
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $message = $this->outputLogMessage('logout');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['id'], null);

        /**
         * return response
         */
        return response()->json($response, $code);
    }
}