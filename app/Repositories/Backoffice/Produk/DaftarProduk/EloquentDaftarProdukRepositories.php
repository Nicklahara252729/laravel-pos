<?php

namespace App\Repositories\Backoffice\Produk\DaftarProduk;

/**
 * component collection 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * models collection
 */

use App\Models\ItemLibrary\Item\Item;
use App\Models\ItemLibrary\ItemOrderSelfImage\ItemOrderSelfImage;
use App\Models\ItemLibrary\ItemInventoryVariant\ItemInventoryVariant;
use App\Models\ItemLibrary\ItemCogsVariant\ItemCogsVariant;
use App\Models\ItemLibrary\ItemMultiPriceVariant\ItemMultiPriceVariant;
use App\Models\ItemLibrary\ItemPriceVariant\ItemPriceVariant;


/**
 * import export collection
 */

use App\Imports\Backoffice\Produk\DaftarProduk\DaftarProdukImport;

/**
 * helpers Collection
 */

use App\Helpers\CheckerHelpers;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Produk\DaftarProduk\DaftarProdukRepositories;

class EloquentDaftarProdukRepositories implements DaftarProdukRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $item;
    protected $itemOrderSelfImage;
    protected $itemInventoryVariant;
    protected $itemCogsVariant;
    protected $itemMultiPriceVariant;
    protected $itemPriceVariant;
    protected $path;
    protected $datetime;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        Item $item,
        ItemOrderSelfImage $itemOrderSelfImage,
        ItemInventoryVariant $itemInventoryVariant,
        ItemCogsVariant $itemCogsVariant,
        ItemMultiPriceVariant $itemMultiPriceVariant,
        ItemPriceVariant $itemPriceVariant
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize model
         */
        $this->item = $item;
        $this->itemOrderSelfImage = $itemOrderSelfImage;
        $this->itemInventoryVariant = $itemInventoryVariant;
        $this->itemCogsVariant = $itemCogsVariant;
        $this->itemMultiPriceVariant = $itemMultiPriceVariant;
        $this->itemPriceVariant = $itemPriceVariant;

        /**
         * static value
         */
        $this->path = path('item');
        $this->datetime = Carbon::now()->toDateTimeString();
    }

    /**
     * get all record
     */
    public function data($uuid_outlet)
    {
        try {

            /**
             * get all data
             */
            $dataProduct = $this->item->select(
                'items.uuid_item',
                'items.product_name',
                'categories.category_name',
                'items.price',
                DB::raw('CASE WHEN items.photo IS NULL THEN CONCAT("' . url($this->path) . '/", "blank.png") ELSE CONCAT("' . url($this->path) . '/", items.photo) END as photo'),
                'items.sku',
                DB::raw('COUNT(item_price_variants.uuid_item_price_variant) AS variant')
            )
                ->join('categories', 'items.uuid_category', '=', 'categories.uuid_category')
                ->leftJoin('item_price_variants', 'items.uuid_item', '=', 'item_price_variants.uuid_item')
                ->where(['items.uuid_outlet' => $uuid_outlet])
                ->groupBy('items.uuid_item', 'items.product_name', 'categories.category_name', 'items.price', 'items.photo', 'items.sku')
                ->get();

            if (count($dataProduct) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'daftar produk'), 404]));
            endif;
            $data = [];
            foreach ($dataProduct as $key => $value) :
                $set = [
                    'uuid_item' => $value->uuid_item,
                    'product_name' => $value->product_name,
                    'category_name' => $value->category_name,
                    'photo' => $value->photo,
                    'sku' => $value->sku,
                    'variants' => [
                        [
                            'uuid_item_price_variant' => 'qwerty1',
                            'name' => 'varian 1',
                        ],
                        [
                            'uuid_item_price_variant' => 'qwerty1',
                            'name' => 'varian 2',
                        ]
                    ]
                ];
                array_push($data,$set);
            endforeach;

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
     * get single data
     */
    public function get($uuidItem, $uuid_outlet)
    {
        try {

            /**
             * check data item
             */
            $getItem = $this->initCheckerHelper->itemChecker([
                'uuid_item' => $uuidItem,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getItem)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'diskon'), 404]));
            endif;

            /**
             * get item order self images
             */
            $getItem['item_order_self_images'] = $this->itemOrderSelfImage->select('*', DB::raw('CASE WHEN product_image IS NULL THEN CONCAT("' . url(path('item')) . '/", "blank.png") ELSE CONCAT("' . url($this->path) . '/", product_image) END as product_image'),)
                ->where('uuid_item', $uuidItem)
                ->get();

            /**
             * get item price variants
             */
            $getItem['variant'] = $this->itemPriceVariant->where('uuid_item', $uuidItem)->get();

            /**
             * get item multi price variants
             */
            $multipleVariant = $this->itemMultiPriceVariant->where('uuid_item', $uuidItem)->get();
            $getItem['multiple_variant'] = $multipleVariant;

            $setItemInventoryVariant = [];
            $setItemCogsVariant = [];
            foreach ($multipleVariant as $key => $value) :

                /**
                 * get item inventory variants
                 */
                $getItemInventoryVariant = $this->initCheckerHelper->itemInventoryVariantChecker([
                    'uuid_item' => $uuidItem,
                    'uuid_item_multiple_price_variant' => $value->uuid_item_multi_price_variant
                ]);
                if (!is_null($getItemInventoryVariant)) :
                    $set = [
                        'uuid_inventory' => $getItemInventoryVariant->uuid_inventory,
                        'track_stock' => $getItemInventoryVariant->track_stock,
                        'in_stock' => $getItemInventoryVariant->in_stock,
                        'alert' => $getItemInventoryVariant->alerts,
                        'alert_at' => $getItemInventoryVariant->alert_at
                    ];
                    array_push($setItemInventoryVariant, $set);
                endif;

                /**
                 * get item cogs variants
                 */
                $getItemCogsVariant = $this->initCheckerHelper->itemCogsVariantChecker([
                    'uuid_item' => $uuidItem,
                    'uuid_item_multiple_price_variant' => $value->uuid_item_multi_price_variant
                ]);
                if (!is_null($getItemCogsVariant)) :
                    $set = [
                        'uuid_cogs' => $getItemCogsVariant->uuid_cogs,
                        'track_cogs' => $getItemCogsVariant->track_cogs,
                        'avg_stock' => $getItemCogsVariant->avg_stock
                    ];
                    array_push($setItemCogsVariant, $set);
                endif;
            endforeach;
            $getItem['inventory_variant'] = $setItemInventoryVariant;
            $getItem['cogs_variant'] = $setItemCogsVariant;

            $response = $this->sendResponse(null, 200, $getItem);
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
            $uuidItem = Uuid::uuid4()->getHex();
            $req['uuid_item'] = $uuidItem;

            /**
             * save daftar produk
             */
            $reqItem = collect($req)->except([
                'product_image',
                'variant_name',
                'variant_price',
                'variant_sku',
                'uuid_sales_type',
                'multiple_variant_name',
                'multiple_variant_sku',
                'multiple_variant_price'
            ])->toArray();

            /**
             * upload file foto
             */
            if (isset($req['photo'])) :
                $file = $req['photo'];
                $photo = Uuid::uuid4()->getHex() . '.' . $file->extension();
                if (!$file->move(public_path($this->path), $photo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $reqItem['photo'] = $photo;
            endif;
            $saveData = $this->item->create($reqItem);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['product_name']));
            endif;

            /**
             * check item price variant
             */
            $itemPriceVariant = [];
            if (isset($req['variant_name']) && !in_array(null, $req['variant_name'], true)) :
                foreach ($req['variant_name'] as $key => $value) :
                    $set = [
                        'uuid_item_price_variant' => Uuid::uuid4()->getHex(),
                        'uuid_item' => $uuidItem,
                        'variant_name' => $value,
                        'price' => $req['variant_price'][$key],
                        'sku' => $req['variant_sku'][$key],
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($itemPriceVariant, $set);
                endforeach;

                /**
                 * save item price variant
                 */
                $saveItemPriceVariant = $this->itemPriceVariant->insert($itemPriceVariant);
                if (!$saveItemPriceVariant) :
                    throw new \Exception($this->outputMessage('unsaved', 'item prica variant'));
                endif;
            endif;

            /**
             * check item multiple price variant
             */
            if ($req['is_multiple_price'] == 'yes') :
                $itemMultiplePriceVariant = [];
                $itemInventoryVariant = [];
                $itemCogsVariant = [];
                if (isset($req['variant_name']) && !in_array(!null, $req['uuid_sales_type'], true)) :
                    foreach ($req['uuid_sales_type'] as $key => $value) :
                        $uuidItemMultiplePricaVariant =  Uuid::uuid4()->getHex();

                        /**
                         * set item multiple price variant
                         */
                        $set = [
                            'uuid_item_multi_price_variant' => $uuidItemMultiplePricaVariant,
                            'uuid_item' => $uuidItem,
                            'uuid_sales_type' => $value,
                            'variant_name' => $req['multiple_variant_name'][$key],
                            'price' => $req['multiple_variant_price'][$key],
                            'sku' => $req['multiple_variant_sku'][$key],
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($itemMultiplePriceVariant, $set);

                        /**
                         * set item inventory variant
                         */
                        $set = [
                            'uuid_inventory' => Uuid::uuid4()->getHex(),
                            'uuid_item' => $uuidItem,
                            'uuid_item_multiple_price_variant' => $uuidItemMultiplePricaVariant,
                            'track_stock' => 'no',
                            'in_stock' => 0,
                            'alerts' => 'no',
                            'alert_at' => 0,
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($itemInventoryVariant, $set);

                        /**
                         * set item cogs variant
                         */
                        $set = [
                            'uuid_cogs' => Uuid::uuid4()->getHex(),
                            'uuid_item' => $uuidItem,
                            'uuid_item_multiple_price_variant' => $uuidItemMultiplePricaVariant,
                            'track_cogs' => 'no',
                            'avg_stock' => 0,
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($itemCogsVariant, $set);
                    endforeach;

                    /**
                     * save item price variant
                     */
                    $saveItemMultiplePriceVariant = $this->itemMultiPriceVariant->insert($itemMultiplePriceVariant);
                    if (!$saveItemMultiplePriceVariant) :
                        throw new \Exception($this->outputMessage('unsaved', 'item multiple prica variant'));
                    endif;

                    /**
                     * save item inventory variane
                     */
                    $saveItemInventoryVariant = $this->itemInventoryVariant->insert($itemInventoryVariant);
                    if (!$saveItemInventoryVariant) :
                        throw new \Exception($this->outputMessage('unsaved', 'item inventory variant'));
                    endif;

                    /**
                     * save item cogs variant
                     */
                    $saveItemCogsVariant = $this->itemCogsVariant->insert($itemCogsVariant);
                    if (!$saveItemCogsVariant) :
                        throw new \Exception($this->outputMessage('unsaved', 'item cogs variant'));
                    endif;

                endif;
            endif;

            /**
             * item order self image
             */
            if ($req['is_order_self'] == 'yes') :
                $productImage = [];
                if (isset($req['product_image']) && !in_array(null, $req['product_image'], true)) :
                    foreach ($req['product_image'] as $key => $value) :
                        $file = $value;
                        $product_image = Uuid::uuid4()->getHex() . '.' . $file->extension();
                        if (!$file->move(public_path($this->path), $product_image)) :
                            throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                        endif;

                        /**
                         * set input
                         */
                        $set = [
                            'uuid_item_order_self' => Uuid::uuid4()->getHex(),
                            'uuid_item' => $uuidItem,
                            'product_image' => $product_image,
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($productImage, $set);
                    endforeach;

                    /**
                     * save image product
                     */
                    $saveImageProduk = $this->itemOrderSelfImage->insert($productImage);
                    if (!$saveImageProduk) :
                        throw new \Exception($this->outputMessage('unsaved', 'image product'));
                    endif;
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['product_name']), 201, null);
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
    public function update($req, $uuidItem, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check data item
             */
            $getItem = $this->initCheckerHelper->itemChecker([
                'uuid_item' => $uuidItem,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getItem)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'diskon'), 404]));
            endif;

            /**
             * save daftar produk
             */
            $reqItem = collect($req)->except([
                'product_image',
                'variant_name',
                'variant_price',
                'variant_sku',
                'uuid_sales_type',
                'multiple_variant_name',
                'multiple_variant_sku',
                'multiple_variant_price',
                '_method'
            ])->toArray();

            /**
             * upload file foto
             */
            if (isset($req['photo'])) :
                $file = $req['photo'];
                $photo = Uuid::uuid4()->getHex() . '.' . $file->extension();

                /**
                 * check file on local storage
                 */
                $photoOld = $this->path . '/' . basename($getItem->photo);
                if (file_exists(public_path($photoOld)) && $photoOld != $this->path . '/blank.png') :
                    unlink(public_path($photoOld));
                endif;

                /**
                 * check directoty
                 */
                if (!$file->move(public_path($this->path), $photo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $reqItem['photo'] = $photo;
            endif;
            $updateData = $this->item->where('uuid_item', $uuidItem)->update($reqItem);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['product_name']));
            endif;

            /**
             * delete item price variant
             */
            $getItemPriceVariant = $this->itemPriceVariant->where('uuid_item', $uuidItem)->get();
            if (count($getItemPriceVariant) > 0) :
                foreach ($getItemPriceVariant as $key => $value) :
                    /**
                     * delete item price variants
                     */
                    $deleteItemPriceVariant = $this->itemPriceVariant
                        ->where('uuid_item_price_variant', $value->uuid_item_price_variant)
                        ->delete();
                    if (!$deleteItemPriceVariant) :
                        throw new \Exception($this->outputMessage('undeleted', 'item price variants'));
                    endif;
                endforeach;
            endif;

            /**
             * resave item price variant
             */
            $itemPriceVariant = [];
            if (isset($req['variant_name']) && !in_array(null, $req['variant_name'], true)) :
                foreach ($req['variant_name'] as $key => $value) :
                    $set = [
                        'uuid_item_price_variant' => Uuid::uuid4()->getHex(),
                        'uuid_item' => $uuidItem,
                        'variant_name' => $value,
                        'price' => $req['variant_price'][$key],
                        'sku' => $req['variant_sku'][$key],
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($itemPriceVariant, $set);
                endforeach;

                /**
                 * save item price variant
                 */
                $saveItemPriceVariant = $this->itemPriceVariant->insert($itemPriceVariant);
                if (!$saveItemPriceVariant) :
                    throw new \Exception($this->outputMessage('unsaved', 'item prica variant'));
                endif;
            endif;

            /**
             * check item multiple price variant
             */
            if ($req['is_multiple_price'] == 'yes') :

                $itemMultiplePriceVariant = [];
                $itemInventoryVariant = [];
                $itemCogsVariant = [];
                if (isset($req['variant_name']) && !in_array(null, $req['uuid_sales_type'], true)) :

                    /**
                     * get item multi price variants
                     */
                    $getItemMultiPriceVariant = $this->itemMultiPriceVariant->where('uuid_item', $uuidItem)->get();
                    if (count($getItemMultiPriceVariant) > 0) :
                        foreach ($getItemMultiPriceVariant as $key => $value) :

                            /**
                             * delete item multi price variants
                             */
                            $deleteMultiPriceVariant = $this->itemMultiPriceVariant
                                ->where('uuid_item_multi_price_variant', $value->uuid_item_multi_price_variant)
                                ->delete();
                            if (!$deleteMultiPriceVariant) :
                                throw new \Exception($this->outputMessage('undeleted', 'item multi price variants'));
                            endif;

                            /**
                             * delete item inventory variants
                             */
                            $deleteItemInventoryVariants = $this->itemInventoryVariant
                                ->where('uuid_item_multi_price_variant', $value->uuid_item_multi_price_variant)
                                ->delete();
                            if (!$deleteItemInventoryVariants) :
                                throw new \Exception($this->outputMessage('undeleted', 'item inventory variants'));
                            endif;

                            /**
                             * delete item cogs variants
                             */
                            $deleteItemCogsVariant = $this->itemCogsVariant
                                ->where('uuid_item_multiple_price_variant', $value->uuid_item_multi_price_variant)
                                ->delete();
                            if (!$deleteItemCogsVariant) :
                                throw new \Exception($this->outputMessage('undeleted', 'item cogs variants'));
                            endif;
                        endforeach;
                    endif;

                    foreach ($req['uuid_sales_type'] as $key => $value) :
                        $uuidItemMultiplePricaVariant =  Uuid::uuid4()->getHex();

                        /**
                         * set item multiple price variant
                         */
                        $set = [
                            'uuid_item_multi_price_variant' => $uuidItemMultiplePricaVariant,
                            'uuid_item' => $uuidItem,
                            'uuid_sales_type' => $value,
                            'variant_name' => $req['multiple_variant_name'][$key],
                            'price' => $req['multiple_variant_price'][$key],
                            'sku' => $req['multiple_variant_sku'][$key],
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($itemMultiplePriceVariant, $set);

                        /**
                         * set item inventory variant
                         */
                        $set = [
                            'uuid_inventory' => Uuid::uuid4()->getHex(),
                            'uuid_item' => $uuidItem,
                            'uuid_item_multiple_price_variant' => $uuidItemMultiplePricaVariant,
                            'track_stock' => 'no',
                            'in_stock' => 0,
                            'alerts' => 'no',
                            'alert_at' => 0,
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($itemInventoryVariant, $set);

                        /**
                         * set item cogs variant
                         */
                        $set = [
                            'uuid_cogs' => Uuid::uuid4()->getHex(),
                            'uuid_item' => $uuidItem,
                            'uuid_item_multiple_price_variant' => $uuidItemMultiplePricaVariant,
                            'track_cogs' => 'no',
                            'avg_stock' => 0,
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($itemCogsVariant, $set);
                    endforeach;

                    /**
                     * save item price variant
                     */
                    $saveItemMultiplePriceVariant = $this->itemMultiPriceVariant->insert($itemMultiplePriceVariant);
                    if (!$saveItemMultiplePriceVariant) :
                        throw new \Exception($this->outputMessage('unsaved', 'item multiple prica variant'));
                    endif;

                    /**
                     * save item inventory variane
                     */
                    $saveItemInventoryVariant = $this->itemInventoryVariant->insert($itemInventoryVariant);
                    if (!$saveItemInventoryVariant) :
                        throw new \Exception($this->outputMessage('unsaved', 'item inventory variant'));
                    endif;

                    /**
                     * save item cogs variant
                     */
                    $saveItemCogsVariant = $this->itemCogsVariant->insert($itemCogsVariant);
                    if (!$saveItemCogsVariant) :
                        throw new \Exception($this->outputMessage('unsaved', 'item cogs variant'));
                    endif;

                endif;
            endif;

            /**
             * item order self image
             */
            if ($req['is_order_self'] == 'yes') :
                $productImage = [];
                if (isset($req['product_image']) && !in_array(null, $req['product_image'], true)) :

                    /**
                     * get item order self images
                     */
                    $getItemOrderSeflImage = $this->itemOrderSelfImage->where('uuid_item', $uuidItem)->get();
                    if (count($getItemOrderSeflImage) > 0) :
                        foreach ($getItemOrderSeflImage as $key => $value) :
                            $productImage = $this->path . '/' . basename($value->product_image);

                            /**
                             * delete item order self image
                             */
                            $deleteItemOrderSelfImage = $this->itemOrderSelfImage
                                ->where('uuid_item_order_self', $value->uuid_item_order_self)
                                ->delete();
                            if (!$deleteItemOrderSelfImage) :
                                throw new \Exception($this->outputMessage('undeleted', 'item order self images'));
                            endif;

                            /**
                             * remove upload file photo
                             */
                            if (file_exists(public_path($productImage))) :
                                unlink(public_path($productImage));
                            endif;
                        endforeach;
                    endif;

                    foreach ($req['product_image'] as $key => $value) :
                        $file = $value;
                        $product_image = Uuid::uuid4()->getHex() . '.' . $file->extension();
                        if (!$file->move(public_path($this->path), $product_image)) :
                            throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                        endif;

                        /**
                         * set input
                         */
                        $set = [
                            'uuid_item_order_self' => Uuid::uuid4()->getHex(),
                            'uuid_item' => $uuidItem,
                            'product_image' => $product_image,
                            'created_at' => $this->datetime,
                            'updated_at' => $this->datetime
                        ];
                        array_push($productImage, $set);
                    endforeach;

                    /**
                     * save image product
                     */
                    $saveImageProduk = $this->itemOrderSelfImage->insert($productImage);
                    if (!$saveImageProduk) :
                        throw new \Exception($this->outputMessage('unsaved', 'image product'));
                    endif;
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['product_name']), 200, null);
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
    public function delete($uuidItem, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data item
             */
            $checkItem = $this->initCheckerHelper->itemChecker([
                'uuid_item' => $uuidItem,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($checkItem)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'data produk'), 404]));
            endif;
            $productName = $checkItem->product_name;
            $photo = $this->path . '/' . basename($checkItem->photo);

            /**
             * delete data item
             */
            $deleteData = $this->item->where([
                'uuid_item' => $uuidItem,
                'uuid_outlet' => $uuid_outlet
            ])->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', $productName));
            endif;

            /**
             * remove upload file photo
             */
            if (file_exists(public_path($photo)) && $photo != $this->path . '/blank.png') :
                unlink(public_path($photo));
            endif;

            /**
             * get item order self images
             */
            $getItemOrderSeflImage = $this->itemOrderSelfImage->where('uuid_item', $uuidItem)->get();
            if (count($getItemOrderSeflImage) > 0) :
                foreach ($getItemOrderSeflImage as $key => $value) :
                    $productImage = $this->path . '/' . basename($value->product_image);

                    /**
                     * delete item order self image
                     */
                    $deleteItemOrderSelfImage = $this->itemOrderSelfImage
                        ->where('uuid_item_order_self', $value->uuid_item_order_self)
                        ->delete();
                    if (!$deleteItemOrderSelfImage) :
                        throw new \Exception($this->outputMessage('undeleted', 'item order self images'));
                    endif;

                    /**
                     * remove upload file photo
                     */
                    if (file_exists(public_path($productImage))) :
                        unlink(public_path($productImage));
                    endif;
                endforeach;
            endif;

            /**
             * get item price variants
             */
            $getItemPriceVariant = $this->itemPriceVariant->where('uuid_item', $uuidItem)->get();
            if (count($getItemPriceVariant) > 0) :
                foreach ($getItemPriceVariant as $key => $value) :
                    /**
                     * delete item price variants
                     */
                    $deleteItemPriceVariant = $this->itemPriceVariant
                        ->where('uuid_item_price_variant', $value->uuid_item_price_variant)
                        ->delete();
                    if (!$deleteItemPriceVariant) :
                        throw new \Exception($this->outputMessage('undeleted', 'item price variants'));
                    endif;
                endforeach;
            endif;

            /**
             * get item multi price variants
             */
            $getItemMultiPriceVariant = $this->itemMultiPriceVariant->where('uuid_item', $uuidItem)->get();
            if (count($getItemMultiPriceVariant) > 0) :
                foreach ($getItemMultiPriceVariant as $key => $value) :

                    /**
                     * delete item multi price variants
                     */
                    $deleteMultiPriceVariant = $this->itemMultiPriceVariant
                        ->where('uuid_item_multi_price_variant', $value->uuid_item_multi_price_variant)
                        ->delete();
                    if (!$deleteMultiPriceVariant) :
                        throw new \Exception($this->outputMessage('undeleted', 'item multi price variants'));
                    endif;

                    /**
                     * delete item inventory variants
                     */
                    $deleteItemInventoryVariants = $this->itemInventoryVariant
                        ->where('uuid_item_multiple_price_variant', $value->uuid_item_multi_price_variant)
                        ->delete();
                    if (!$deleteItemInventoryVariants) :
                        throw new \Exception($this->outputMessage('undeleted', 'item inventory variants'));
                    endif;

                    /**
                     * delete item cogs variants
                     */
                    $deleteItemCogsVariant = $this->itemCogsVariant
                        ->where('uuid_item_multiple_price_variant', $value->uuid_item_multi_price_variant)
                        ->delete();
                    if (!$deleteItemCogsVariant) :
                        throw new \Exception($this->outputMessage('undeleted', 'item cogs variants'));
                    endif;
                endforeach;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $productName), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * get item by kategori
     */
    public function itemByKategori($uuidCategori)
    {
        try {

            /**
             * get all data
             */
            $dataProduct = $this->item->select('uuid_item', 'product_name')
                ->where(['uuid_category' => $uuidCategori])
                ->get();
            if (count($dataProduct) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'daftar produk'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataProduct);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * import data daftar produk
     */
    public function import($request)
    {
        try {
            $imported = Excel::import(new DaftarProdukImport, $request);

            if (!$imported) :
                throw new \Exception($this->outputMessage('fail import', 'daftar produk'));
            endif;
            $response = $this->sendResponse($this->outputMessage('imported', 'daftar produk'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
