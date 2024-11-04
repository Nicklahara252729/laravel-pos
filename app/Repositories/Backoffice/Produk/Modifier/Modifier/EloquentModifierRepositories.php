<?php

namespace App\Repositories\Backoffice\Produk\Modifier\Modifier;

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

use App\Models\Modifier\Modifier\Modifier;
use App\Models\Modifier\ModifierOption\ModifierOption;

/**
 * import helpers 
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories 
 */

use App\Repositories\Backoffice\Produk\Modifier\Modifier\ModifierRepositories;

class EloquentModifierRepositories implements ModifierRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $path;
    protected $modifier;
    protected $datetime;
    protected $modifierOption;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        Modifier $modifier,
        ModifierOption $modifierOption
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

        /**
         * static value
         */
        $this->datetime = Carbon::now()->toDateTimeString();
    }

    /**
     * get all record
     */
    public function data($uuid_outlet)
    {
        try {
            /**
             * get all data modifier
             */
            $dataModifier = $this->modifier->select('modifier_name', 'uuid_modifier')
                ->where(['uuid_outlet' => $uuid_outlet])
                ->get();
            if (count($dataModifier) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier'), 404]));
            endif;

            /**
             * get all data modifier option
             */
            $data = [];
            foreach ($dataModifier as $key => $value) :
                $dataModifierOption = $this->modifierOption->select('option_name')
                    ->where('uuid_modifier', $value->uuid_modifier)
                    ->get();
                $set = [
                    'uuid_modifier' => $value->uuid_modifier,
                    'modifier_name' => $value->modifier_name,
                    'option' => $dataModifierOption
                ];
                array_push($data, $set);
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
    public function get($uuidModifier, $uuid_outlet)
    {
        try {

            /**
             * get data modifier
             */
            $getModifier = $this->initCheckerHelper->modifierChecker([
                'uuid_modifier' => $uuidModifier,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getModifier)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier'), 404]));
            endif;

            /**
             * get modifier option
             */
            $dataModifierOption = $this->modifierOption->select('option_name', 'price', 'uuid_modifier_option')
                ->where('uuid_modifier', $uuidModifier)
                ->get();

            /**
             * set response
             */
            $data = [
                'uuid_modifier' => $getModifier->uuid_modifier,
                'modifier_name' => $getModifier->modifier_name,
                'is_limit' => $getModifier->is_limit,
                'is_stock' => $getModifier->is_stock,
                'is_limit_required' => $getModifier->is_limit_required,
                'max_number_limit' => $getModifier->max_number_limit,
                'min_number_limit' => $getModifier->min_number_limit,
                'option' => $dataModifierOption
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

            /**
             * form data
             */
            $uuidModifier = Uuid::uuid4()->getHex();
            $req['uuid_modifier'] = $uuidModifier;

            /**
             * save modifier
             */
            $reqModifier = collect($req)->except([
                'option_name',
                'option_price'
            ])->toArray();
            $saveModifier = $this->modifier->create($reqModifier);
            if (!$saveModifier) :
                throw new \Exception($this->outputMessage('unsaved', 'modifier'));
            endif;

            /**
             * save modifier option
             */
            if (isset($req['option_name']) && !in_array(null, $req['option_name'], true)) :
                $reqModifierOption = [];
                foreach ($req['option_name'] as $key => $value) :
                    $set = [
                        'uuid_modifier_option' => Uuid::uuid4()->getHex(),
                        'uuid_modifier' => $uuidModifier,
                        'option_name' => $value,
                        'price' => $req['option_price'][$key],
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($reqModifierOption, $set);
                endforeach;

                $saveModifier = $this->modifierOption->insert($reqModifierOption);
                if (!$saveModifier) :
                    throw new \Exception($this->outputMessage('unsaved', 'modifier option'));
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['modifier_name']), 201, null);
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
    public function update($req, $uuidModifier, $uuid_outlet)
    {
        DB::beginTransaction();

        try {
            /**
             * check data modifier
             */
            $checkGratuity = $this->initCheckerHelper->modifierChecker([
                "uuid_modifier" => $uuidModifier,
                "uuid_outlet" => $uuid_outlet
            ]);
            if (empty($checkGratuity)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier'), 404]));
            endif;

            /**
             * set input modifier
             */
            $reqModifier = collect($req)->except([
                'option_name',
                'option_price',
                '_method'
            ])->toArray();

            /**
             * update data modifier
             */
            $updateData = $this->modifier->where([
                'uuid_modifier' => $uuidModifier,
                'uuid_outlet' => $uuid_outlet
            ])->update($reqModifier);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['modifier_name']));
            endif;

            /**
             * check modifier option
             */
            $getModifierOption = $this->initCheckerHelper->modifierOptionChecker(['uuid_modifier' => $uuidModifier]);

            /**
             * delete old modifier option
             */
            if (!is_null($getModifierOption)) :
                $deleteModifierOption = $this->modifierOption->where('uuid_modifier', $uuidModifier)->delete();
                if (!$deleteModifierOption) :
                    throw new \Exception($this->outputMessage('undeleted', 'modifier option'));
                endif;
            endif;

            /**
             * save new modifier option
             */
            if (isset($req['option_name']) && !in_array(null, $req['option_name'], true)) :
                $reqModifierOption = [];
                foreach ($req['option_name'] as $key => $value) :
                    $set = [
                        'uuid_modifier_option' => Uuid::uuid4()->getHex(),
                        'uuid_modifier' => $uuidModifier,
                        'option_name' => $value,
                        'price' => $req['option_price'][$key],
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($reqModifierOption, $set);
                endforeach;

                $saveModifier = $this->modifierOption->insert($reqModifierOption);
                if (!$saveModifier) :
                    throw new \Exception($this->outputMessage('unsaved', 'modifier option'));
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'modifier'), 200, null);
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
    public function delete($uuidModifier, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * check data modifier
             */
            $getModifier = $this->initCheckerHelper->modifierChecker([
                'uuid_modifier' => $uuidModifier,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getModifier)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'modifier'), 404]));
            endif;
            $modifierName = $getModifier->modifier_name;

            /**
             * delete data modifier
             */
            $deleteData = $this->modifier->where([
                'uuid_modifier' => $uuidModifier,
                'uuid_outlet' => $uuid_outlet
            ])->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', $modifierName));
            endif;

            /**
             * check modifier option
             */
            $getModifierOption = $this->initCheckerHelper->modifierOptionChecker(['uuid_modifier' => $uuidModifier]);

            /**
             * delete old modifier option
             */
            if (!is_null($getModifierOption)) :
                $deleteModifierOption = $this->modifierOption->where('uuid_modifier', $uuidModifier)->delete();
                if (!$deleteModifierOption) :
                    throw new \Exception($this->outputMessage('undeleted', 'modifier option'));
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $modifierName), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
