<?php

namespace App\Http\Middleware;

/**
 * import component
 */

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * import trait
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

class Outlet
{
    use Message, Response;

    private $checkerHelpers;

    public function __construct(
        CheckerHelpers $checkerHelpers
    ) {

        /**
         * initialize helper
         */
        $this->checkerHelpers = $checkerHelpers;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $uuid_outlet = !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $request->header('outlet');
        $checkOutlet = $this->checkerHelpers->outletChecker(['uuid_outlet' => $uuid_outlet]);
        if (is_null($checkOutlet)) :
            $response = $this->sendResponse($this->outputMessage('not found','outlet'), 404);
            $code = $response['code'];
            unset($response['code']);
            return response($response, $code);
        endif;

        return $next($request);
    }
}
