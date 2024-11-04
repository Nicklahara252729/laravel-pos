<?php

namespace App\Http\Controllers\Api\Auth\Login;

/**
 * import component collection
 */

use App\Http\Controllers\Controller;

/**
 * import form request
 */

use App\Http\Requests\Auth\Login\StoreRequest;

/**
 * import repositories
 */

use App\Repositories\Auth\Login\LoginRepositories;

class LoginController extends Controller
{
    protected $loginRepositories;

    public function __construct(
        LoginRepositories $loginRepositories
    ) {
        /**
         * defined repositories
         */
        $this->loginRepositories = $loginRepositories;
    }

    /**
     * login
     */
    public function login(StoreRequest $storeRequest)
    {
        /**
         * form request
         */
        $storeRequest = $storeRequest->validated();
        $storeRequest = collect($storeRequest)->only(['identity', 'password'])->toArray();

        /**
         * process
         */
        $response = $this->loginRepositories->login($storeRequest);
        $code = $response['code'];
        unset($response['code']);

        /**
         * return response
         */
        return response()->json($response, $code);
    }
}
