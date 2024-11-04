<?php

namespace App\Http\Controllers\Api\Backoffice\Dashboard;

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
 * import repositories
 */

use App\Repositories\Backoffice\Dashboard\DashboardRepositories;
use App\Repositories\Log\LogRepositories;

class DashboardController extends Controller
{
    use Message;

    private $logRepositories;
    private $dashboardRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        DashboardRepositories $dashboardRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->dashboardRepositories = $dashboardRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get all record
     */
    public function data()
    {
        /**
         * process
         */
        $date = !empty($this->request->get('date')) ? explode('-',$this->request->get('date')) : null;
        $response = $this->dashboardRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'dashboard');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
