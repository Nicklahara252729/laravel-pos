<?php

namespace App\Repositories\Backoffice\Produk\Modifier\ModifierIngredient;

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
use App\Models\Modifier\ModifierIngredient\ModifierIngredient;

/**
 * import helpers 
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories 
 */

use App\Repositories\Backoffice\Produk\Modifier\ModifierIngredient\ModifierIngredientRepositories;

class EloquentModifierIngredientRepositories implements ModifierIngredientRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $path;
    protected $datetime;
    protected $modifierIngredient;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        ModifierIngredient $modifierIngredient
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize repositories
         */
        $this->modifierIngredient = $modifierIngredient;

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
            $data = $this->modifierIngredient->select('modifier_ingredients.*')
                ->join('modifiers', 'modifier_ingredients.uuid_modifier', '=', 'modifiers.uuid_modifier')
                ->where(['modifiers.uuid_outlet' => $uuid_outlet, 'modifier_ingredients.uuid_modifier' => $uuidModifier])
                ->get();
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier ingredient'), 404]));
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
    public function get($uuidModifierIngredient, $uuid_outlet)
    {
        try {

            /**
             * get data modifier ingredient
             */
            $getModifierIngredient = $this->initCheckerHelper->modifierIngredientChecker([
                'uuid_modifier_ingredient' => $uuidModifierIngredient,
                'modifiers.uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getModifierIngredient)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier ingredient'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getModifierIngredient);
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
             * save modifier ingredient
             */
            $saveModifierIngredient = $this->modifierIngredient->create($req);
            if (!$saveModifierIngredient) :
                throw new \Exception($this->outputMessage('unsaved', 'modifier ingredient'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', 'modifier ingredient'), 201, null);
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
    public function update($req, $uuidModifierIngredient, $uuid_outlet)
    {
        DB::beginTransaction();

        try {
            /**
             * check data modifier ingredient
             */
            $getModifierIngredient = $this->initCheckerHelper->modifierIngredientChecker([
                'uuid_modifier_ingredient' => $uuidModifierIngredient,
                'modifiers.uuid_outlet' => $uuid_outlet
            ]);
            if (empty($getModifierIngredient)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier ingredient'), 404]));
            endif;

            /**
             * update data modifier ingredient
             */
            $updateData = $this->modifierIngredient->where(['uuid_modifier_ingredient' => $uuidModifierIngredient])->update($req);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', 'modifier ingredient'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'modifier ingredient'), 200, null);
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
    public function delete($uuidModifierIngredient, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check data modifier
             */
            $getModifier = $this->initCheckerHelper->modifierIngredientChecker([
                'uuid_modifier_ingredient' => $uuidModifierIngredient,
                'modifiers.uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getModifier)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier ingredient'), 404]));
            endif;

            DB::commit();
            $response = $this->sendResponse(null, 200, $this->outputMessage('deleted', 'modifier ingredient'));
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
