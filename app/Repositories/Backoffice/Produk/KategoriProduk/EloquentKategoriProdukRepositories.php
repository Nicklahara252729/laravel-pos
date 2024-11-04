<?php

namespace App\Repositories\Backoffice\Produk\KategoriProduk;

/**
 * component collection 
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Exceptions\CustomException;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * models collection
 */

use App\Models\Category\Category;
use App\Models\ItemLibrary\Item\Item;

/**
 * helpers Collection
 */

use App\Helpers\CheckerHelpers;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Produk\KategoriProduk\KategoriProdukRepositories;

class EloquentKategoriProdukRepositories implements KategoriProdukRepositories
{
    use Message, Response;

    private $initCheckerHelper;
    private $category;
    private $date;
    private $item;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        Category $category,
        Item $item
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize model
         */
        $this->category = $category;
        $this->item = $item;

        /**
         * static value
         */
        $this->date = Carbon::now()->toDateTimeString();
    }

    /**
     * get all record
     */
    public function data($uuid_outlet, $search)
    {
        try {

            /**
             * get and check data
             */
            $dataCategory = $this->category->select(DB::raw('COUNT(items.product_name) as jumlah_barang'), 'category_name', 'categories.uuid_category')
                ->leftJoin('items', 'items.uuid_category', "=", 'categories.uuid_category')
                ->where(['categories.uuid_outlet' => $uuid_outlet, 'deleted_at' => null]);
            if (!is_null($search)) :
                $dataCategory = $dataCategory->where('category_name', 'like', '%' . $search . '%');
            endif;
            $dataCategory = $dataCategory->groupBy('category_name')->paginate(10);

            if (count($dataCategory) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'kategori produk'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataCategory);
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
    public function get($uuid_kategori_produk, $uuid_outlet)
    {
        try {

            /**
             * get data category
             */
            $getCategory = $this->category->select(DB::raw('COUNT(items.product_name) as jumlah_barang'), 'category_name', 'categories.uuid_category')
                ->leftJoin('items', 'items.uuid_category', "=", 'categories.uuid_category')
                ->where(['categories.uuid_category' => $uuid_kategori_produk, 'deleted_at' => null, 'categories.uuid_outlet' => $uuid_outlet])
                ->groupBy('category_name')
                ->first();
            if (is_null($getCategory)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'kategori produk'), 404]));
            endif;

            /**
             * get item
             */
            $getItem = $this->item->select('product_name')->where('uuid_category', $getCategory->uuid_category)->get();
            $data = [
                'uuid_category' => $getCategory->uuid_category,
                'category_name' => $getCategory->category_name,
                'jumlah_barang' => $getCategory->jumlah_barang,
                'item' => $getItem
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
            $saveData = $this->category->create($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['category_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['category_name']), 201, null);
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
    public function update($req, $uuid_kategori_produk, $uuid_outlet)
    {
        DB::begintransaction();
        try {
            /**
             * check data  
             */
            $checkKategoriProduk = $this->initCheckerHelper->categoryChecker(['uuid_category' => $uuid_kategori_produk, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($checkKategoriProduk)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'kategori produk'), 404]));
            endif;

            /**
             * update process
             */
            $updateData = $this->category->where(["uuid_category" => $uuid_kategori_produk, 'uuid_outlet' => $uuid_outlet])->update($req);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['category_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['category_name']), 200, null);
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
    public function delete($uuid_kategori_produk, $uuid_outlet)
    {
        DB::beginTransaction();

        try {
            /**
             * check data
             */
            $getCategory = $this->initCheckerHelper->categoryChecker(["uuid_category" => $uuid_kategori_produk, 'uuid_outlet' => $uuid_outlet]);
            if (is_null($getCategory)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $name = $getCategory->category_name;

            /**
             * delete data
             */
            $deleteCategory = $this->category->where(["uuid_category" => $uuid_kategori_produk, 'uuid_outlet' => $uuid_outlet])->update(["deleted_at" => $this->date]);
            if (!$deleteCategory) :
                throw new \Exception($this->outputMessage('undeleted', $name));
            endif;

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

    /**
     * assign item
     */
    public function assignItem($req, $uuid_kategori_produk, $uuid_outlet)
    {
        DB::begintransaction();
        try {
            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'assign item'), 200, null);
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
