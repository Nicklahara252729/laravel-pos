<?php

namespace App\Http\Controllers\Api\Backoffice\Notifikasi;

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

use App\Repositories\Backoffice\Notifikasi\NotifikasiRepositories;
use App\Repositories\Log\LogRepositories;

class NotifikasiController extends Controller
{
    use Message;

    private $logRepositories;
    private $notifikasiRepositories;
    private $request;

    public function __construct(
        LogRepositories $logRepositories,
        NotifikasiRepositories $notifikasiRepositories,
        Request $request
    ) {
        /**
         * defined repositories
         */
        $this->notifikasiRepositories = $notifikasiRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * defined component
         */
        $this->request = $request;
    }

    /**
     * get record current
     */
    public function current()
    {
        /**
         * process
         */
        $response = $this->notifikasiRepositories->current();
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'notifikasi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
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
        $response = $this->notifikasiRepositories->data($date);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('all data', 'notifikasi');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
