<?php

namespace App\Repositories\Backoffice\Ingredient\KategoriBahan;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;

/**
 * import traits
 */

use App\Traits\ValidatorFormat;
use App\Traits\Message;
use App\Traits\Response;

/**
 * import models
 */

use App\Models\Ingredient\IngredientCategory\IngredientCategory;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import interface
 */

use App\Repositories\Backoffice\Ingredient\KategoriBahan\KategoriBahanRepositories;

class EloquentKategoriBahanRepositories implements KategoriBahanRepositories
{
    use ValidatorFormat, Message, Response;

    protected $initCheckerHelper;
    protected $ingredientCategory;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        IngredientCategory $ingredientCategory
    ) {
        /**
         * initialize helper
         */
        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize Models
         */
        $this->ingredientCategory = $ingredientCategory;
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
            $dataIngredientCategory = $this->ingredientCategory->select('category_name', 'uuid_ingredient_category')
                ->selectRaw("'0' AS jumlah_barang")
                ->where(["uuid_outlet" => $uuid_outlet])
                ->paginate(10);
            if (count($dataIngredientCategory) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'kategori bahan'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataIngredientCategory);
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
    public function save($req, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            $saveData = $this->ingredientCategory->create($req);
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
    public function update($req, $uuid_ingredient_category, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data
             */
            $checkIngredientCategory = $this->initCheckerHelper->ingredientCategoryChecker([
                "uuid_ingredient_category" => $uuid_ingredient_category,
                "uuid_outlet" => $uuid_outlet
            ]);
            if (is_null($checkIngredientCategory)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'kategori bahan'), 404]));
            endif;

            /**
             * update process
             */
            $updateData = $this->ingredientCategory->where([
                'uuid_ingredient_category' => $uuid_ingredient_category,
                'uuid_outlet' => $uuid_outlet
            ])->update($req);
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
    public function delete($uuid_ingredient_catgeory, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data
             */
            $checkIngredientCategory = $this->initCheckerHelper->ingredientCategoryChecker([
                'uuid_ingredient_category' => $uuid_ingredient_catgeory,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($checkIngredientCategory)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $ingredientCategory = $checkIngredientCategory->category_name;

            /**
             * delete data
             */

            $deleteData = $this->ingredientCategory->where([
                'uuid_ingredient_category' => $uuid_ingredient_catgeory,
                'uuid_outlet' => $uuid_outlet
            ])->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', $ingredientCategory));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $ingredientCategory), 200, null);
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
     * get single data
     */
    public function get($uuid_ingredient_category, $uuid_outlet)
    {
        try {
            $getIngredientCategory = $this->initCheckerHelper->ingredientCategoryChecker([
                'uuid_ingredient_category' => $uuid_ingredient_category,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getIngredientCategory)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'kategori bahan'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getIngredientCategory);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * assign item
     */
    public function assignItem($req, $uuid_ingredient_category, $uuid_outlet)
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
