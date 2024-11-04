<?php

namespace App\Repositories\Token;

/**
 * import collection
 */

use Illuminate\Support\Facades\Auth;

/**
 * import trait
 */

 use App\Traits\Response;

/**
 * import repositories
 */

use App\Repositories\Token\TokenRepositories;

class EloquentTokenRepositories implements TokenRepositories
{
    use Response;

    public function __construct()
    {
    }

    /**
     * validation
     */
    public function validation()
    {
        try {
            $response = [
                'message' => 'token valid',
                'data' =>  Auth::user()
            ];
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * refresh
     */
    public function refresh()
    {
        try {
            $response = $this->sendResponse(null, 200, [
                'token'      => Auth::refresh(),                    
                'type'       => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60
            ]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
