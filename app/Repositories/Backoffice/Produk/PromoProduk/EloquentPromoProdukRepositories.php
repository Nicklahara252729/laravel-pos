<?php

namespace App\Repositories\Backoffice\Produk\PromoProduk;

/**
 * import component  
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Exceptions\CustomException;
use Ramsey\Uuid\Uuid;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import models 
 */

use App\Models\Promo\Promo\Promo;
use App\Models\Promo\PromoAssignOutlet\PromoAssignOutlet;
use App\Models\Promo\PromoAssignSalesType\PromoAssignSalesType;
use App\Models\Promo\PromoPurchase\PromoPurchase;
use App\Models\Promo\PromoItem\PromoItem;

/**
 * import helpers 
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories 
 */

use App\Repositories\Backoffice\Produk\PromoProduk\PromoProdukRepositories;

class EloquentPromoProdukRepositories implements PromoProdukRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $promo;
    protected $datetime;
    protected $promoAssignOutlet;
    protected $promoAssignSalesType;
    protected $promoPurchase;
    protected $promoItem;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        Promo $promo,
        PromoAssignOutlet $promoAssignOutlet,
        PromoAssignSalesType $promoAssignSalesType,
        PromoPurchase $promoPurchase,
        PromoItem $promoItem
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize repositories
         */
        $this->promo = $promo;
        $this->promoAssignOutlet = $promoAssignOutlet;
        $this->promoAssignSalesType = $promoAssignSalesType;
        $this->promoPurchase = $promoPurchase;
        $this->promoItem = $promoItem;

        /**
         * static value
         */
        $this->datetime = Carbon::now()->toDateTimeString();
    }

    /**
     * get all record
     */
    public function data()
    {
        try {
            /**
             * get all data
             */
            $data = $this->promo->select(
                'promo_name',
                'config_date_from',
                'config_date_until',
                'config_hour_from',
                'config_hour_until',
                'uuid_promo'
            )->get();
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'promo produk'), 404]));
            endif;

            /**
             * set response
             */
            $output = [];
            foreach ($data as $key => $value) :

                /**
                 * set date from 
                 */
                $dateFrom = Carbon::parse($value->config_date_from)->locale('id');
                $dateFrom->settings(['formatFunction' => 'translatedFormat']);

                /**
                 * set date until
                 */
                $dateUntil = Carbon::parse($value->config_date_until)->locale('id');
                $dateUntil->settings(['formatFunction' => 'translatedFormat']);

                /**
                 * set time from
                 */
                $timeFrom = Carbon::parse($value->config_hour_from)->locale('id');
                $timeFrom->settings(['formatFunction' => 'translatedFormat']);

                /**
                 * set time until
                 */
                $timeUntil = Carbon::parse($value->config_hour_until)->locale('id');
                $timeUntil->settings(['formatFunction' => 'translatedFormat']);

                /**
                 * assign outlet
                 */
                $outlet = $this->promoAssignOutlet->select('outlet_name')
                    ->join('outlets', 'promo_assign_outlets.uuid_outlet', '=', 'outlets.uuid_outlet')
                    ->where('uuid_promo', $value->uuid_promo)
                    ->get();

                $set = [
                    'uuid_promo' => $value->uuid_promo,
                    'promo' => $value->promo_name,
                    'date' => $dateFrom->format('j F Y') . ' - ' . $dateUntil->format('j F Y'),
                    'time' => $timeFrom->format('H:i') . ' - ' . $timeUntil->format('H:i'),
                    'outlet' => $outlet
                ];
                array_push($output, $set);
            endforeach;

            $perPage = 10; // Sesuaikan dengan jumlah item per halaman yang diinginkan.
            $currentPage = request()->input('page', 1);
            $pagedData = array_slice($output, ($currentPage - 1) * $perPage, $perPage);
            $output = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($output), $perPage, $currentPage);

            $response = $this->sendResponse(null, 200, $output);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * get single data
     */
    public function get($uuidPromo)
    {
        try {

            /**
             * get data promo
             */
            $getPromo = $this->initCheckerHelper->promoChecker(['uuid_promo' => $uuidPromo]);
            if (is_null($getPromo)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'promo produk'), 404]));
            endif;

            /**
             * get assign outlet
             */
            $getAssignOutlet = $this->promoAssignOutlet->select('outlet_name', 'promo_assign_outlets.*')
                ->join('outlets', 'promo_assign_outlets.uuid_outlet', '=', 'outlets.uuid_outlet')
                ->where('uuid_promo', $uuidPromo)
                ->get();

            /**
             * get sales type
             */
            $getSalesType = $this->promoAssignSalesType->where('uuid_promo', $uuidPromo)->get();

            /**
             * get promo purchase
             */
            $getPromoPurchase = $this->promoPurchase->select(
                'product_name',
                'variant_name',
                'promo_purchases.qty'
            )
                ->join('promo_items', 'promo_purchases.uuid_promo_purchase', '=', 'promo_items.uuid_promo_purchase')
                ->join('items', 'promo_items.uuid_item', '=', 'items.uuid_item')
                ->join('item_price_variants', 'promo_items.uuid_item_price_variant', '=', 'item_price_variants.uuid_item_price_variant')
                ->get();

            /**
             * set output
             */
            $data['promo'] = $getPromo;
            $data['assign_outlet'] = $getAssignOutlet;
            $data['sales_type'] = $getSalesType;
            $data['purchase'] = $getPromoPurchase;


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

            /**
             * form data
             */
            $uuidPromo = Uuid::uuid4()->getHex();
            $req['uuid_promo'] = $uuidPromo;

            /**
             * save promo produk
             */
            $reqPromo = collect($req)->except([
                'uuid_outlet',
                'uuid_sales_type',
                'purchase_type',
                'qty',
                'uuid_category',
                'config_day',
                'qty_purchase',
                'uuid_item',
                'uuid_item_price_variant',
                'qty_item'
            ])->toArray();
            $reqPromo['config_day'] = json_encode($req['config_day']);
            $saveData = $this->promo->create($reqPromo);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['promo_name']));
            endif;

            /**
             * check promo assign outlet
             */
            $promoAssingOutlet = [];
            if (isset($req['uuid_outlet']) && !in_array(null, $req['uuid_outlet'], true)) :

                /**
                 * set input value promo assign outlet
                 */
                foreach ($req['uuid_outlet'] as $key => $value) :
                    $set = [
                        'uuid_promo_assign_outlet' => Uuid::uuid4()->getHex(),
                        'uuid_promo' => $uuidPromo,
                        'uuid_outlet' => $value,
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($promoAssingOutlet, $set);
                endforeach;

                /**
                 * save promo assign outlet
                 */
                $savePromoAssingOutlet = $this->promoAssignOutlet->insert($promoAssingOutlet);
                if (!$savePromoAssingOutlet) :
                    throw new \Exception($this->outputMessage('unsaved', 'promo assign outlet'));
                endif;
            endif;

            /**
             * check promo purchase
             */
            if (isset($req['purchase_type']) && !in_array(null, $req['purchase_type'], true)) :

                /**
                 * set input promo purchase
                 */
                $uuidPromoPurchase = Uuid::uuid4()->getHex();
                $setPromoPurchse = [
                    'uuid_promo_purchase' => $uuidPromoPurchase,
                    'uuid_promo' => $uuidPromo,
                    'purchase_type' => $value,
                    'qty' => $req['qty_purchase']
                ];

                /**
                 * save promo purchase
                 */
                $savePromoPurchase = $this->promoPurchase->create($setPromoPurchse);
                if (!$savePromoPurchase) :
                    throw new \Exception($this->outputMessage('unsaved', 'promo purchase'));
                endif;

                /**
                 * set input promo item
                 */
                $setPromoItem = [];
                if ($req['purchase_type'] == 'item') :

                    /**
                     * set input value
                     */
                    foreach ($req['uuid_item'] as $key => $value) :
                        $set = [
                            'uuid_promo_item' => Uuid::uuid4()->getHex(),
                            'uuid_promo_purchase' => $uuidPromoPurchase,
                            'uuid_item' => $value,
                            'uuid_item_price_variant' => $req['uuid_item_price_variant'][$key],
                            'qty' => $req['qty_item'][$key],
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($setPromoItem, $set);
                    endforeach;

                    /**
                     * save promo item
                     */
                    $savePromoItem = $this->promoItem->insert($setPromoItem);
                    if (!$savePromoItem) :
                        throw new \Exception($this->outputMessage('unsaved', 'promo item'));
                    endif;
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['promo_name']), 201, null);
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
    public function update($req, $uuidPromo)
    {
        DB::beginTransaction();

        try {
            /**
             * check data
             */
            $checkPromo = $this->initCheckerHelper->promoChecker(["uuid_promo" => $uuidPromo]);
            if (is_null($checkPromo)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'promo produk'), 404]));
            endif;

            /**
             * save promo produk
             */
            $reqPromo = collect($req)->except([
                'uuid_outlet',
                'uuid_sales_type',
                'purchase_type',
                'qty',
                'uuid_category',
                'config_day',
                'qty_purchase',
                'uuid_item',
                'uuid_item_price_variant',
                'qty_item'
            ])->toArray();
            $reqPromo['config_day'] = json_encode($req['config_day']);
            $updateData = $this->promo->where('uuid_promo', $uuidPromo)->update($reqPromo);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['promo_name']));
            endif;

            /**
             * check promo assign outlet
             * and delete data if exist
             */
            $checkPromoAssignOutlet = $this->initCheckerHelper->promoAssignSalesOutletChecker(['uuid_promo' => $uuidPromo]);
            if (!is_null($checkPromoAssignOutlet)) :
                $deletePromoOutlet = $this->promoAssignOutlet->where('uuid_promo', $uuidPromo)->delete();
                if (!$deletePromoOutlet) :
                    throw new \Exception($this->outputMessage('undeleted', 'promo assign outlet'));
                endif;
            endif;

            /**
             * resave data promo outlet
             */
            $promoAssingOutlet = [];
            if (isset($req['uuid_outlet']) && !in_array(null, $req['uuid_outlet'], true)) :

                /**
                 * set input value promo assign outlet
                 */
                foreach ($req['uuid_outlet'] as $key => $value) :
                    $set = [
                        'uuid_promo_assign_outlet' => Uuid::uuid4()->getHex(),
                        'uuid_promo' => $uuidPromo,
                        'uuid_outlet' => $value,
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($promoAssingOutlet, $set);
                endforeach;

                /**
                 * save promo assign outlet
                 */
                $savePromoAssingOutlet = $this->promoAssignOutlet->insert($promoAssingOutlet);
                if (!$savePromoAssingOutlet) :
                    throw new \Exception($this->outputMessage('unsaved', 'promo assign outlet'));
                endif;
            endif;

            /**
             * check promo purchase
             * and delete data if exist
             */
            $checkPromoPurchase = $this->initCheckerHelper->promoPurchaseChecker(['uuid_promo' => $uuidPromo]);
            if (!is_null($checkPromoPurchase)) :

                /**
                 * delete promo purchase
                 */
                $deletePromoPurchase = $this->promoPurchase->where('uuid_promo', $uuidPromo)->delete();
                if (!$deletePromoPurchase) :
                    throw new \Exception($this->outputMessage('undeleted', 'promo purchase'));
                endif;

                /**
                 * delete promo item
                 */
                $deletePromoItem = $this->promoItem->where('uuid_promo_purchase', $checkPromoPurchase->uuid_promo_purchase)->delete();
                if (!$deletePromoItem) :
                    throw new \Exception($this->outputMessage('undeleted', 'promo item'));
                endif;
            endif;

            /**
             * check promo purchase
             */
            if (isset($req['purchase_type']) && !in_array(null, $req['purchase_type'], true)) :

                /**
                 * set input promo purchase
                 */
                $uuidPromoPurchase = Uuid::uuid4()->getHex();
                $setPromoPurchse = [
                    'uuid_promo_purchase' => $uuidPromoPurchase,
                    'uuid_promo' => $uuidPromo,
                    'purchase_type' => $value,
                    'qty' => $req['qty_purchase']
                ];

                /**
                 * save promo purchase
                 */
                $savePromoPurchase = $this->promoPurchase->create($setPromoPurchse);
                if (!$savePromoPurchase) :
                    throw new \Exception($this->outputMessage('unsaved', 'promo purchase'));
                endif;

                /**
                 * set input promo item
                 */
                $setPromoItem = [];
                if ($req['purchase_type'] == 'item') :

                    /**
                     * set input value
                     */
                    foreach ($req['uuid_item'] as $key => $value) :
                        $set = [
                            'uuid_promo_item' => Uuid::uuid4()->getHex(),
                            'uuid_promo_purchase' => $uuidPromoPurchase,
                            'uuid_item' => $value,
                            'uuid_item_price_variant' => $req['uuid_item_price_variant'][$key],
                            'qty' => $req['qty_item'][$key],
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($setPromoItem, $set);
                    endforeach;

                    /**
                     * save promo item
                     */
                    $savePromoItem = $this->promoItem->insert($setPromoItem);
                    if (!$savePromoItem) :
                        throw new \Exception($this->outputMessage('unsaved', 'promo item'));
                    endif;
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['promo_name']), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * delete data
     */
    public function delete($uuidPromo)
    {
        DB::beginTransaction();
        try {
            /**
             * check data
             */
            $checkPromo = $this->initCheckerHelper->promoChecker([
                'uuid_promo' => $uuidPromo,
            ]);
            if (is_null($checkPromo)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $promoName = $checkPromo->promo_name;

            /**
             * delete data promo
             */
            $deletePromo = $this->promo->where(['uuid_promo' => $uuidPromo])->delete();
            if (!$deletePromo) :
                throw new \Exception($this->outputMessage('undeleted', $promoName));
            endif;

            /**
             * check assign outlet
             */
            $checkAssignOutlet = $this->initCheckerHelper->promoAssignSalesTypeChecker(['uuid_promo' => $uuidPromo]);
            if (!is_null($checkAssignOutlet)) :
                $deletePromoAssignOutlet = $this->promoAssignOutlet->where(['uuid_promo' => $uuidPromo])->delete();
                if (!$deletePromoAssignOutlet) :
                    throw new \Exception($this->outputMessage('undeleted', 'promo assign outlet'));
                endif;
            endif;

            /**
             * check sales type
             */
            $checkSalesType = $this->promoAssignSalesType->where(['uuid_promo' => $uuidPromo]);
            if (!is_null($checkSalesType)) :
                $deletePromoAssignOutlet = $this->promoAssignOutlet->where(['uuid_promo' => $uuidPromo])->delete();
                if (!$deletePromoAssignOutlet) :
                    throw new \Exception($this->outputMessage('undeleted', 'promo assign outlet'));
                endif;
            endif;

            /**
             * check promo purchase
             */
            $checkPromoPurchase = $this->promoPurchase->join('promo_items', 'promo_purchases.uuid_promo_purchase', '=', 'promo_items.uuid_promo_purchase')
                ->where(['uuid_promo' => $uuidPromo]);
            if (!is_null($checkSalesType->first())) :
                $checkPromoPurchase = $checkPromoPurchase->delete();
                if (!$checkPromoPurchase) :
                    throw new \Exception($this->outputMessage('undeleted', 'promo purchase'));
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $promoName), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
