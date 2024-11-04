<?php

namespace App\Repositories\Backoffice\Dashboard;

/**
 * import component
 */

use App\Exceptions\CustomException;

/**
 * import traits
 */

use App\Traits\Response;
use App\Traits\Message;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Dashboard\DashboardRepositories;

class EloquentDashboardRepositories implements DashboardRepositories
{
    use Response, Message;

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
     * get all record
     */
    public function data($date)
    {
        try {
            $data = [
                "widget_data" => [
                    "gross_sales" => 100000,
                    "net_sales" => 3400000,
                    "gross_profit" => 331000,
                    "transactions" => 989000,
                    "average_sale_per_transaction" => 11000,
                    "gross_margin" => 87
                ],
                "table_data" => [
                    [
                        'number' => 1,
                        'product_name' => 'Item 01',
                        'category' => 'CAT 01',
                        'sold_quantity' => 12,
                        'price' => 140000
                    ],
                    [
                        'number' => 2,
                        'product_name' => 'Item 02',
                        'category' => 'CAT 02',
                        'sold_quantity' => 12,
                        'price' => 140000
                    ],
                    [
                        'number' => 3,
                        'product_name' => 'Item 03',
                        'category' => 'CAT 03',
                        'sold_quantity' => 12,
                        'price' => 140000
                    ]
                ]
            ];

            $response = $this->sendResponse(null, 200, $data);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
