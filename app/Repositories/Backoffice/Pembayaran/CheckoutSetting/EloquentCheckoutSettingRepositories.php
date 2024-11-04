<?php

namespace App\Repositories\Backoffice\Pembayaran\CheckoutSetting;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * helpers Collection
 */

use App\Helpers\CheckerHelpers;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Pembayaran\CheckoutSetting\CheckoutSettingRepositories;

class EloquentCheckoutSettingRepositories implements CheckoutSettingRepositories
{

    use Message, Response;

    private $initCheckerHelper;

    public function __construct(
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */
        $this->initCheckerHelper = $initCheckerHelper;
    }


    /**
     * get single data
     */
    public function get($uuid_outlet)
    {
        try {

            $data = [
                'gratuity_activation' => 'yes',
                'tax_activation' => 'yes',
                'tax_gratuity_type' => 'add',
                'rounding_activation' => 'yes',
                'rounding_type' => 2,
                'rounding_number' => 10500,
                'stock_limit' => 'yes',
                'stock_limit_type' => 'yes'
            ];

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * update data
     */
    public function update($req, $uuid_outlet)
    {
        DB::beginTransaction();

        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'checkout setting'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
