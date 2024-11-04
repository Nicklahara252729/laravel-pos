<?php

namespace App\Repositories\Backoffice\Profile\Pengaturan;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Ramsey\Uuid\Uuid;

/**
 * import models
 */

use App\Models\GeneralSetting\GeneralSetting\GeneralSetting;
use App\Models\BusinessInfo\BusinessInfo;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Profile\Pengaturan\PengaturanRepositories;

class EloquentPengaturanRepositories implements PengaturanRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $logoPath;
    protected $npwpPath;
    protected $generalSetting;
    protected $businessInfo;

    public function __construct(
        GeneralSetting $generalSetting,
        BusinessInfo $businessInfo,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize models
         */
        $this->generalSetting = $generalSetting;
        $this->businessInfo = $businessInfo;

        /**
         * static value
         */
        $this->logoPath = path('logo');
        $this->npwpPath = path('npwp');
    }

    /**
     * get pengaturan
     */
    public function get()
    {
        try {
            $getGeneralSetting['sistem'] = $this->generalSetting->select('setting_name','description')
                ->selectRaw('CASE WHEN setting_name = "logo" THEN CONCAT("' . url($this->logoPath) . '/", description) ELSE description END as description')
                ->whereIn('setting_name', ['logo', 'application name'])
                ->orderByDesc('id')
                ->get();
            $businessInfo = $this->initCheckerHelper->businessInfoChecker();
            $getInfoBisnis['info_bisnis'] = collect($businessInfo)->except(['npwp_name', 'npwp', 'npwp_photo'])->toArray();
            $getNpwp['npwp'] = collect($businessInfo)->only(['npwp_name', 'npwp', 'npwp_photo'])->toArray();
            $data = array_merge($getGeneralSetting, $getInfoBisnis, $getNpwp);

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
     * update sistem
     */
    public function updateSistem($request)
    {
        DB::beginTransaction();
        try {

            /**
             * check setting
             */
            $getSetting = $this->initCheckerHelper->generalSettingChecker('logo');
            if (is_null($getSetting)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pengguna'), 404]));
            endif;

            /**
             * upload file
             */
            if (isset($request['logo'])) :
                $file  = $request['logo'];
                $logo = Uuid::uuid4()->getHex() . '.' . $file->extension();

                /**
                 * check file on local storage
                 */
                $logoOld = $getSetting->description;
                if (file_exists(public_path($this->logoPath . "/" . $logoOld))) :
                    unlink(public_path($this->logoPath . "/" . $logoOld));
                endif;

                /**
                 * check directoty
                 */
                if (!$file->move(public_path($this->logoPath), $logo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $updateLogo = $this->generalSetting->where(["setting_name" => 'logo'])->update(['description' => $logo]);
                if (!$updateLogo) :
                    throw new \Exception($this->outputMessage('update fail', 'sistem'));
                endif;
            endif;

            /**
             * update application name
             */
            $updateApplicationName = $this->generalSetting->where(["setting_name" => 'application name'])->update(['description' => $request['application_name']]);
            if (!$updateApplicationName) :
                throw new \Exception($this->outputMessage('update fail', 'sistem'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'sistem'), 200, null);
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
     * update info bisnis
     */
    public function updateInfoBisnis($request)
    {
        DB::beginTransaction();
        try {

            /**
             * get business info
             */
            $businessInfo = $this->businessInfo->first();

            /**
             * update business info
             */
            $update = $this->businessInfo->where('uuid_business_info', $businessInfo->uuid_business_info)->update($request);
            if (!$update) :
                throw new \Exception($this->outputMessage('update fail', 'business info'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'business info'), 200, null);
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
     * update npwp
     */
    public function updateNpwp($request)
    {
        DB::beginTransaction();
        try {

            /**
             * get business info
             */
            $businessInfo = $this->businessInfo->first();

            /**
             * upload file
             */
            if (isset($request['npwp_photo'])) :
                $file  = $request['npwp_photo'];
                $npwpPhoto = Uuid::uuid4()->getHex() . '.' . $file->extension();

                /**
                 * check file on local storage
                 */
                $npwpPhotoOld = $businessInfo->npwp_photo;
                if (!is_null($npwpPhotoOld) && file_exists(public_path($this->npwpPath . "/" . $npwpPhotoOld))) :
                    unlink(public_path($this->npwpPath . "/" . $npwpPhotoOld));
                endif;

                /**
                 * check directoty
                 */
                if (!$file->move(public_path($this->npwpPath), $npwpPhoto)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $request['npwp_photo'] = $npwpPhoto;
            endif;

            /**
             * update NPWP
             */
            $update = $this->businessInfo->where('uuid_business_info', $businessInfo->uuid_business_info)->update($request);
            if (!$update) :
                throw new \Exception($this->outputMessage('update fail', 'NPWP'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'NPWP'), 200, null);
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
