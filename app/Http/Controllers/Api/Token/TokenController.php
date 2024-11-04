<?php

namespace App\Http\Controllers\Api\Token;

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

use App\Repositories\Token\TokenRepositories;
use App\Repositories\Log\LogRepositories;

class TokenController extends Controller
{
    use Message;

    private $logRepositories;
    protected $tokenRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        TokenRepositories $tokenRepositories
    ) {
        /**
         * definde repositories
         */
        $this->tokenRepositories = $tokenRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->middleware('auth:api', ['except' => ['login', 'register', 'refresh']]);
    }

    /**
     * validation
     */
    public function validation()
    {
        /**
         * log user
         */
        $message = $this->outputLogMessage('validation');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        $response = $this->tokenRepositories->validation();
        return response()->json($response);
    }

    /**
     * refresh
     */
    public function refresh()
    {
        /**
         * refresh token
         */
        $response = $this->tokenRepositories->refresh();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('refresh');
        $this->logRepositories->saveLog($message['action'], $message['message'], null, null);
        return response()->json($response);
    }
}
