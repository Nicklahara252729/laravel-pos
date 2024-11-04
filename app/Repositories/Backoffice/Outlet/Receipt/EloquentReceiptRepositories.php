<?php

namespace App\Repositories\Backoffice\Outlet\Receipt;

/**
 * import component
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Illuminate\Support\Carbon;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import models
 */

use App\Models\Outlet\Outlet;
use App\Models\Settings\ReceiptSettings\ReceiptSettings;

/**
 * import helper
 */

use App\Helpers\CheckerHelpers;

/**
 * import interface
 */

use App\Repositories\Backoffice\Outlet\Receipt\ReceiptRepositories;

class EloquentReceiptRepositories implements ReceiptRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $fbUrl;
    protected $twitterUrl;
    protected $igUrl;
    protected $outlet;
    protected $receiptSetting;
    protected $path;

    public function __construct(
        Outlet $outlet,
        ReceiptSettings $receiptSetting,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * init models
         */
        $this->outlet = $outlet;
        $this->receiptSetting = $receiptSetting;

        /**
         * static value
         */
        $this->fbUrl = 'https://www.facebook.com/';
        $this->twitterUrl = 'https://twitter.com/';
        $this->igUrl = 'https://www.instagram.com/';
        $this->path = path('outlet');
    }

    /**
     * query preview
     */
    public function queryPreview($uuidOutlet, $uuidTransaksi = null)
    {
        /**
         * get outlet data
         */
        $getOutlet = $this->outlet->select('outlet_name', 'phone_number')
            ->selectRaw('CASE WHEN logo IS NULL THEN CONCAT("' . url($this->path) . '/", "blank.png") ELSE CONCAT("' . url($this->path) . '/", logo) END as logo')
            ->selectRaw("CONCAT(address, ' ', 
                (SELECT name FROM indonesia_provinces WHERE id = outlets.id_province LIMIT 1),', ',
                (SELECT name FROM indonesia_cities WHERE id = outlets.id_city LIMIT 1),', ',
                (SELECT name FROM indonesia_districts WHERE id = outlets.id_district LIMIT 1),', ',
                postal_code
                ) 
                AS alamat")
            ->where(['uuid_outlet' => $uuidOutlet])
            ->first();
        if (is_null($getOutlet)) :
            throw new CustomException(json_encode([$this->outputMessage('not found', 'outlet'), 404]));
        endif;

        /**
         * convert tanggal
         */
        $tanggal = Carbon::now()->locale('id');
        $tanggal->settings(['formatFunction' => 'translatedFormat']);

        /**
         * get receipt setting
         */
        $getReceiptSetting = $this->initCheckerHelper->receiptSettingChecker(['uuid_outlet' => $uuidOutlet]);
        if (is_null($getReceiptSetting)) :
            throw new CustomException(json_encode([$this->outputMessage('not found', 'receipt setting'), 404]));
        endif;

        $data = [
            'header' => [
                'logo' => $getOutlet->logo,
                'outlet' => $getOutlet->outlet_name,
                'alamat' => ucwords($getOutlet->alamat),
                'phone' => $getOutlet->phone_number,
            ],
            'footer' => [
                'website' => is_null($getReceiptSetting) ? null : $getReceiptSetting->website_url,
                'facebook' => is_null($getReceiptSetting) ? null : $getReceiptSetting->facebook_url,
                'twitter' => is_null($getReceiptSetting) ? null : $getReceiptSetting->twitter_url,
                'instagram' => is_null($getReceiptSetting) ? null : $getReceiptSetting->instagram_url,
                'note' => is_null($getReceiptSetting) ? null : $getReceiptSetting->notes,
            ],
            'info' => [
                'date' => $tanggal->format('j F Y - h:i:s '),
                'receipt_number' => '',
                'customer_name' => '',
                'served_by' => '',
                'collected_by' => '',
                'sales_type' => '',
            ],
            'item' => [],
            'amount' => [
                'subtotal' => '',
                'tax_gratuity' => []
            ],
            'total' => [
                'total' => '',
                'type' => '',
                'amount' => '',
                'change' => ''
            ]
        ];

        return $data;
    }

    /**
     * perview receipt
     */
    public function preview($uuidOutlet)
    {
        try {
            $data = $this->queryPreview($uuidOutlet);
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
    public function update($req, $uuidOutlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check outlet
             */
            $checkOutlet = $this->receiptSetting->join('outlets', 'receipt_settings.uuid_outlet', '=', 'outlets.uuid_outlet')
                ->where('receipt_settings.uuid_outlet', $uuidOutlet)
                ->first();
            if (is_null($checkOutlet)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'outlet'), 404]));
            endif;

            /**
             * update receipt
             */
            $updateReceiptSetting = $this->receiptSetting->where('uuid_outlet', $uuidOutlet)->update($req);
            if (!$updateReceiptSetting) :
                throw new \Exception($this->outputMessage('update fail', 'receipt setting'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'receipt'), 200, null);
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
