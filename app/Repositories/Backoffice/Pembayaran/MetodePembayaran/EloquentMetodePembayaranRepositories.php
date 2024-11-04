<?php

namespace App\Repositories\Backoffice\Pembayaran\MetodePembayaran;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
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
 * repositories collection
 */

use App\Repositories\Backoffice\Pembayaran\MetodePembayaran\MetodePembayaranRepositories;

class EloquentMetodePembayaranRepositories implements MetodePembayaranRepositories
{

    use Response, Message;

    private $initCheckerHelper;
    private $path;

    public function __construct(
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * static value
         */
        $this->path = path('payment');
    }

    /**
     * get listing payment
     */
    public function paymentList()
    {
        try {
            $data = [
                [
                    'uuid_payment_list' => 1,
                    'list' => 'Cash',
                    'icon' => null,
                    'row' => [],
                ],
                [
                    'uuid_payment_list' => 1,
                    'list' => 'E-Wallet',
                    'icon' => null,
                    'row' => [
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Gopay',
                            'icon' => url($this->path . "/Gopay.png")
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Ovo',
                            'icon' => url($this->path . "/Ovo.png")
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Dana',
                            'icon' => url($this->path . "/Dana.png")
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'LinkAja',
                            'icon' => url($this->path . "/LinkAja.png")
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'ShopeePay',
                            'icon' => url($this->path . "/ShopeePay.png")
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Akulaku',
                            'icon' => url($this->path . "/Akulaku.png")
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Kredivo',
                            'icon' => url($this->path . "/Kredivo.png")
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Wechatpay',
                            'icon' => url($this->path . "/Wechatpay.png")
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Alipay',
                            'icon' => url($this->path . "/Alipay.png")
                        ]
                    ],
                ],
                [
                    'uuid_payment_list' => 1,
                    'list' => 'Online Delivery',
                    'icon' => null,
                    'row' => [
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'GoFood',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'GrabFood',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'ShopeeFood',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Traveloka Eats',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'AirAsia Food',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Other Online Delivery',
                            'icon' => null
                        ]
                    ],
                ],
                [
                    'uuid_payment_list' => 1,
                    'list' => 'EDC',
                    'icon' => null,
                    'row' => [
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'BCA',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Mandiri',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'BNI',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'BRI',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'CIMB NIAGA',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Other EDC',
                            'icon' => null
                        ]
                    ],
                ],
                [
                    'uuid_payment_list' => 1,
                    'list' => 'E-Commerce',
                    'icon' => null,
                    'row' => [
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Tokopedia',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Shopee',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Lazada',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Bukalapak',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Blibli',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Other E-Commerce',
                            'icon' => null
                        ]
                    ],
                ],
                [
                    'uuid_payment_list' => 1,
                    'list' => 'Other',
                    'icon' => null,
                    'row' => [
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Gopay',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Ovo',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'BCA QR',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Dana',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'LinkAja',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Shopeepay',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Atome',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'YUKK',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Online Order',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Gift Card',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Bank Transfer',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'WhatsApp',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'BCA Debit Off Us',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'BCA Card',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Flazz BCA',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Reward BCA',
                            'icon' => null
                        ],
                        [
                            'uuid_payment_list' => 1,
                            'list' => 'Other',
                            'icon' => null
                        ],
                    ],
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

    /**
     * get data metode pembayaran
     */
    public function data()
    {
        try {
            $data = [
                [
                    'uuid_metode_pembayaran' => 1,
                    'outlet' => 1,
                    'nama_konfigurasi' => 'Konfigurasi Default'
                ],
                [
                    'uuid_metode_pembayaran' => 1,
                    'outlet' => 3,
                    'nama_konfigurasi' => 'Konfigurasi Custom'
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

    /**
     * get single data
     */
    public function get($uuidPaymentConfiguration)
    {
        try {

            $data = [
                'configuration_name' => 'Konfigurasi default',
                'outlet' => [
                    [
                        'uuid_outlet' => 1,
                        'outlet_name' => 'leven barber seminyak'
                    ],
                    [
                        'uuid_outlet' => 1,
                        'outlet_name' => 'outlet kemuning'
                    ],
                ],
                'payment' => [
                    [
                        'uuid_payment_list' => 1,
                        'list' => 'Cash',
                        'icon' => null,
                        'row' => [],
                    ],
                    [
                        'uuid_payment_list' => 1,
                        'list' => 'E-Wallet',
                        'icon' => null,
                        'row' => [
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'Gopay',
                                'icon' => url($this->path . "/Gopay.png")
                            ],
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'Ovo',
                                'icon' => url($this->path . "/Ovo.png")
                            ],
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'Dana',
                                'icon' => url($this->path . "/Dana.png")
                            ],
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'LinkAja',
                                'icon' => url($this->path . "/LinkAja.png")
                            ],
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'ShopeePay',
                                'icon' => url($this->path . "/ShopeePay.png")
                            ],
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'Akulaku',
                                'icon' => url($this->path . "/Akulaku.png")
                            ],
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'Kredivo',
                                'icon' => url($this->path . "/Kredivo.png")
                            ],
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'Wechatpay',
                                'icon' => url($this->path . "/Wechatpay.png")
                            ],
                            [
                                'uuid_payment_list' => 1,
                                'list' => 'Alipay',
                                'icon' => url($this->path . "/Alipay.png")
                            ]
                        ],
                    ],
                ]

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
     * save data
     */
    public function save($req)
    {
        DB::beginTransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['configuration_name']), 201, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * update data
     */
    public function update($req, $uuidPaymentConfiguration)
    {
        DB::begintransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['configuration_name']), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * delete data
     */
    public function delete($uuidPaymentConfiguration)
    {
        DB::beginTransaction();

        try {
            $name = 'tes metode pembayaran';
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $name), 200, null);
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
