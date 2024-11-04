<?php

namespace App\Repositories\Backoffice\Produk\Modifier\ModifierItem;

/**
 * import component  
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
 * import models 
 */

use App\Models\Modifier\Modifier\Modifier;
use App\Models\Modifier\ModifierOption\ModifierOption;
use App\Models\Modifier\ModifierItem\ModifierItem;

/**
 * import helpers 
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories 
 */

use App\Repositories\Backoffice\Produk\Modifier\ModifierItem\ModifierItemRepositories;

class EloquentModifierItemRepositories implements ModifierItemRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $path;
    protected $modifier;
    protected $datetime;
    protected $modifierOption;
    protected $modifierItem;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        Modifier $modifier,
        ModifierOption $modifierOption,
        ModifierItem $modifierItem
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize repositories
         */
        $this->modifier = $modifier;
        $this->modifierOption = $modifierOption;
        $this->modifierItem = $modifierItem;

        /**
         * static value
         */
        $this->datetime = Carbon::now()->toDateTimeString();
    }

    /**
     * get all record
     */
    public function data($uuidModifier, $uuid_outlet)
    {
        try {
            /**
             * get all data modifier
             */
            $data = $this->modifierItem->select('modifier_items.*', 'product_name')
                ->join('modifiers', 'modifier_items.uuid_modifier', '=', 'modifiers.uuid_modifier')
                ->join('items', 'modifier_items.uuid_item', '=', 'items.uuid_item')
                ->where(['modifiers.uuid_outlet' => $uuid_outlet, 'modifier_items.uuid_modifier' => $uuidModifier])
                ->get();
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier item'), 404]));
            endif;

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
    public function get($uuidModifierItem, $uuid_outlet)
    {
        try {

            /**
             * get data modifier item
             */
            $getModifierItem = $this->initCheckerHelper->modifierItemChecker([
                'uuid_modifier_item' => $uuidModifierItem,
                'modifiers.uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getModifierItem)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier item'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getModifierItem);
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
             * save modifier item
             */
            $saveModifierItem = $this->modifierItem->create($req);
            if (!$saveModifierItem) :
                throw new \Exception($this->outputMessage('unsaved', 'modifier item'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', 'modifier item'), 201, null);
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
    public function update($req, $uuidModifierItem, $uuid_outlet)
    {
        DB::beginTransaction();

        try {
            /**
             * check data modifier item
             */
            $getModifierItem = $this->initCheckerHelper->modifierItemChecker([
                'uuid_modifier_item' => $uuidModifierItem,
                'modifiers.uuid_outlet' => $uuid_outlet
            ]);
            if (empty($getModifierItem)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier item'), 404]));
            endif;

            /**
             * update data modifier item
             */
            $updateData = $this->modifierItem->where(['uuid_modifier_item' => $uuidModifierItem])->update($req);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', 'modifier item'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'modifier item'), 200, null);
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
    public function delete($uuidModifierItem, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check data modifier
             */
            $getModifier = $this->initCheckerHelper->modifierItemChecker([
                'uuid_modifier_item' => $uuidModifierItem,
                'modifiers.uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getModifier)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier item'), 404]));
            endif;

            /**
             * delete data modifier
             */
            $deleteData = $this->modifierItem->where('uuid_modifier_item', $uuidModifierItem)->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', 'modifier item'));
            endif;

            DB::commit();
            $response = $this->sendResponse(null, 200, $this->outputMessage('deleted', 'modifier item'));
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
