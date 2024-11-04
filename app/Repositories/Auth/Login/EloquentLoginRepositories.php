<?php

namespace App\Repositories\Auth\Login;

/**
 * import collection
 */

use Illuminate\Support\Facades\Auth;

/**
 * import trait
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import repositories
 */

use App\Repositories\Auth\Login\LoginRepositories;
use App\Repositories\Log\LogRepositories;

class EloquentLoginRepositories implements LoginRepositories
{
    use Message, Response;

    private $logRepositories;

    public function __construct(
        LogRepositories $logRepositories
    ) {
        $this->logRepositories = $logRepositories;
    }

    /**
     * login
     */
    public function login($request)
    {
        try {
            /**
             * filter input only identity, password
             */
            $credentials = [
                'email' => $request['identity'],
                'password' => $request['password']
            ];
            $token = Auth::attempt($credentials);

            /**
             * create token
             */
            if (!$token) :
                $message = $this->outputLogMessage('login fail', $request['identity']);
                $uuidUser = null;
                $response = $this->sendResponse($this->outputMessage('invalid'), 401);
            else :
                $message = $this->outputLogMessage('login success', $request['identity']);
                $uuidUser = Auth::user()->uuid_user;
                $response = $this->sendResponse(null, 200, [
                    'token'      => $token,                    
                    'type'       => 'bearer',
                    'expires_in' => Auth::factory()->getTTL() * 60
                ]);
            endif;

            /**
             * save log
             */
            $this->logRepositories->saveLog($message['action'], $message['message'], $uuidUser, null);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
