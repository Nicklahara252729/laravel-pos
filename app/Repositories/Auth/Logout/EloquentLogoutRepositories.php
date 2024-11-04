<?php

namespace App\Repositories\Auth\Logout;

/**
 * import trait
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import collection
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * import repositories
 */

use App\Repositories\Auth\Logout\LogoutRepositories;
use App\Repositories\Log\LogRepositories;

class EloquentLogoutRepositories implements LogoutRepositories
{
    use Message, Response;

    private $signature;
    private $logRepositories;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories
    ) {
        /**
         * initialize repositories
         */
        $this->logRepositories = $logRepositories;

        /**
         * initialize component
         */
        $this->signature = base64_decode($request->header('signature'));
    }

    /**
     * logout
     */
    public function logout()
    {
        try {
            /**
             * log user
             */
            $message = $this->outputLogMessage('logout');
            $this->logRepositories->saveLog($message['action'], $message['message'], $this->signature, null);
            
            Auth::logout();
            $response  = $this->success($this->outputMessage('logout'));
        } catch (\Exception $e) {
            $response = $this->error($e->getMessage());
        }
        return $response;
    }
}
