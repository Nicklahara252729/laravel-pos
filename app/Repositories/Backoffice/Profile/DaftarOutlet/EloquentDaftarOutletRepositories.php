<?php

namespace App\Repositories\Backoffice\Profile\DaftarOutlet;

/**
 * component collection 
 */

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Exceptions\CustomException;

/**
 * models collection
 */

use App\Models\Outlet\Outlet;
use App\Models\GeneralSetting\GeneralSettingAssign\GeneralSettingAssign;
use App\Models\GeneralSetting\GeneralSetting\GeneralSetting;
use App\Models\Settings\ReceiptSettings\ReceiptSettings;

/**
 * helpers collection
 */

use App\Helpers\CheckerHelpers;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Profile\DaftarOutlet\DaftarOutletRepositories;

class EloquentDaftarOutletRepositories implements DaftarOutletRepositories
{
    use Message, Response;

    private $outlet;
    private $initCheckerHelper;
    private $path;
    private $storage;
    private $generalSettingAssign;
    private $generalSetting;
    private $date;
    private $receiptSetting;

    public function __construct(
        Outlet $outlet,
        GeneralSettingAssign $generalSettingAssign,
        GeneralSetting $generalSetting,
        ReceiptSettings $receiptSetting,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize model
         */
        $this->outlet = $outlet;
        $this->generalSettingAssign = $generalSettingAssign;
        $this->generalSetting = $generalSetting;
        $this->receiptSetting = $receiptSetting;

        /**
         * initialize helpers
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * static value
         */
        $this->path = path('outlet');
        $this->date = Carbon::now()->toDateTimeString();
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
            $address = 'CONCAT(address,", ",indonesia_districts.name,", ",indonesia_cities.name,", ",indonesia_provinces.name, ", ",postal_code)';
            $dataOutlet = $this->outlet->select(
                'uuid_outlet',
                'outlet_name',
                'phone_number',
                DB::raw('CASE WHEN ' . $address . ' IS NULL THEN address ELSE ' . $address . ' END as address'),
                DB::raw('CASE WHEN logo IS NULL THEN CONCAT("' . url($this->path) . '/", "blank.png") ELSE CONCAT("' . url($this->path) . '/", logo) END as logo')
            )
                ->leftJoin('indonesia_provinces', 'outlets.id_province', '=', 'indonesia_provinces.id')
                ->leftJoin('indonesia_cities', 'outlets.id_city', '=', 'indonesia_cities.id')
                ->leftJoin('indonesia_districts', 'outlets.id_district', '=', 'indonesia_districts.id')
                ->get();
            if (count($dataOutlet) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'daftar outlet'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $dataOutlet);
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
    public function get($uuid_outlet)
    {
        try {
            $getDataOutlet = $this->initCheckerHelper->outletChecker(["uuid_outlet" => $uuid_outlet]);
            if (is_null($getDataOutlet)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'outlet'), 404]));
            endif;
            $response = $this->sendResponse(null, 200, $getDataOutlet);
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
             * add uuid outlet
             */
            $req['uuid_outlet'] = Uuid::uuid4()->getHex();

            /**
             * upload logo
             */
            if (isset($req['logo'])) :
                $file = $req['logo'];
                $logo = Uuid::uuid4()->getHex() . '.' . $file->extension();
                if (!$file->move(public_path($this->path), $logo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $req['logo'] = $logo;
            endif;

            /**
             * get general setting
             */
            $getGeneralSetting = $this->generalSetting->get();
            $generalSettingAssign = [];
            foreach ($getGeneralSetting as $key => $value) :
                $setGeneralSettingAssign = [
                    'uuid_general_setting_assign' => Uuid::uuid4()->getHex(),
                    'uuid_outlet'                 => $req['uuid_outlet'],
                    'uuid_general_setting'        => $value->uuid_general_settings,
                    'setting_status'              => "disabled",
                    "created_at"                  => $this->date,
                    "updated_at"                  => $this->date
                ];
                array_push($generalSettingAssign, $setGeneralSettingAssign);
            endforeach;

            /**
             * save data outlet
             */
            $saveData = $this->outlet->create($req);
            $saveGeneralSetttingAssign = $this->generalSettingAssign->insert($generalSettingAssign);
            $saveReceiptSetting = $this->receiptSetting->create(['uuid_outlet' => $req['uuid_outlet']]);
            if (!$saveData || !$saveGeneralSetttingAssign || !$saveReceiptSetting) :
                throw new \Exception($this->outputMessage('unsaved', $req['outlet_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['outlet_name']), 201, null);
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
    public function update($request, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check outlet
             */
            $checkOutlet = $this->initCheckerHelper->outletChecker(["uuid_outlet" => $uuid_outlet]);
            if (is_null($checkOutlet)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'outlet'), 404]));
            endif;

            /**
             * upload logo
             */
            if (isset($request['logo'])) :
                $file = $request['logo'];
                $logo = Uuid::uuid4()->getHex() . '.' . $file->extension();

                /**
                 * check file on local storage
                 */
                $logoOld = basename($checkOutlet->logo);
                if (file_exists(public_path($this->path . "/" . $logoOld)) && $logo != 'blank.png') :
                    unlink(public_path($this->path . "/" . $logoOld));
                endif;

                /**
                 * check directoty
                 */
                if (!$file->move(public_path($this->path), $logo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $request['logo'] = $logo;
            endif;

            /**
             * update data outleta
             */
            $saveData = $this->outlet->where(["uuid_outlet" => $uuid_outlet])->update($request);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('update fail', $request['outlet_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $request['outlet_name']), 200, null);
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
    public function delete($uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * validation
             */
            $getDataOutlet = $this->initCheckerHelper->outletChecker(["uuid_outlet" => $uuid_outlet]);
            if (is_null($getDataOutlet)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $logo = basename($getDataOutlet->logo);
            $outletName = $getDataOutlet->outlet_name;

            /**
             * check data general setting assign
             */
            $checkGeneralSettingAssign = $this->initCheckerHelper->generalSettingAssignChecker(["uuid_outlet" => $uuid_outlet]);
            if (is_null($checkGeneralSettingAssign)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'general setting'), 404]));
            endif;

            /**
             * delete data outlet
             */
            $deleteOutlet               = $this->outlet->where(["uuid_outlet" => $uuid_outlet])->delete();
            $deleteGeneralSettingAssign = $this->generalSettingAssign->where(["uuid_outlet" => $uuid_outlet])->delete();

            /**
             * true response
             */
            if (!$deleteOutlet || !$deleteGeneralSettingAssign) :
                throw new \Exception($this->outputMessage('undeleted', $outletName));
            endif;

            /**
             * delete logo
             */
            if (file_exists(public_path($this->path . "/" . $logo)) && $logo != 'blank.png') :
                if (!unlink(public_path($this->path . "/" . $logo))) :
                    throw new \Exception($this->outputMessage('undeleted', 'logo'));
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $outletName), 200, null);
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
