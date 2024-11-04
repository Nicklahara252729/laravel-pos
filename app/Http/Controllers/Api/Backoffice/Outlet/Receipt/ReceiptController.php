<?php

namespace App\Http\Controllers\Api\Backoffice\Outlet\Receipt;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import trait
 */

use App\Traits\Message;

/**
 * import request
 */

use Illuminate\Http\Request;
use App\Http\Requests\Outlet\Receipt\UpdateRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Outlet\Receipt\ReceiptRepositories;
use App\Repositories\Log\LogRepositories;

class ReceiptController extends Controller
{
    use Message;

    protected $logRepositories;
    protected $receiptRepositories;
    protected $outlet;
    protected $request;

    public function __construct(
        Request $request,
        LogRepositories $logRepositories,
        ReceiptRepositories $receiptRepositories
    ) {
        /**
         * defined repositories
         */
        $this->receiptRepositories = $receiptRepositories;
        $this->logRepositories = $logRepositories;

        /**
         * static variable
         */
        $this->outlet = $request->header('outlet');
    }

    /**
     * set uuid outlet
     */
    private function uuidOutlet()
    {
        return !is_null(authAttribute()['uuidOutlet']) ? authAttribute()['uuidOutlet'] : $this->outlet;
    }

    /**
     * get preview receipt
     */
    public function preview()
    {
        /**
         * process
         */
        $uuidOutlet = $this->uuidOutlet();
        $response = $this->receiptRepositories->preview($uuidOutlet);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'receipt');
        $this->logRepositories->saveLog($message['action'], $message['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }

    /**
     * update receipt
     */
    public function update(
        UpdateRequest $updateRequest
    ) {

        /**
         * set log 
         */
        $uuidOutlet = $this->uuidOutlet();
        $log = $this->outputLogMessage('update', $uuidOutlet, 'receipt', 'receipt');

        /**
         * process
         */
        $response  = $this->receiptRepositories->update(
            $updateRequest->validated(),
            $uuidOutlet
        );
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], authAttribute()['uuidUser'], null);

        return response()->json($response, $code);
    }
}
