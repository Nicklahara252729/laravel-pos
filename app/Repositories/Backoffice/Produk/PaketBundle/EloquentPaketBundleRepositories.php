<?php

namespace App\Repositories\Backoffice\Produk\PaketBundle;

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

use App\Models\BundlePackage\BundlePackage\BundlePackage;
use App\Models\BundlePackage\BundlePackageAssign\BundlePackageAssign;
use App\Models\BundlePackage\BundlePackageItem\BundlePackageItem;
use App\Models\BundlePackage\BundlePackageMultiple\BundlePackageMultiple;

/**
 * import helpers 
 */

use App\Helpers\CheckerHelpers;

/**
 * import repositories 
 */

use App\Repositories\Backoffice\Produk\PaketBundle\PaketBundleRepositories;

class EloquentPaketBundleRepositories implements PaketBundleRepositories
{
    use Message, Response;

    protected $initCheckerHelper;
    protected $path;
    protected $datetime;
    protected $bundlePackage;
    protected $bundlePackageAssign;
    protected $bundlePackageItem;
    protected $bundlePackageMultiple;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        BundlePackage $bundlePackage,
        BundlePackageAssign $bundlePackageAssign,
        BundlePackageItem $bundlePackageItem,
        BundlePackageMultiple $bundlePackageMultiple
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize repositories
         */
        $this->bundlePackage = $bundlePackage;
        $this->bundlePackageAssign = $bundlePackageAssign;
        $this->bundlePackageItem = $bundlePackageItem;
        $this->bundlePackageMultiple = $bundlePackageMultiple;

        /**
         * static value
         */
        $this->datetime = Carbon::now()->toDateTimeString();
        $this->path = path('bundle');
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
            $data = $this->bundlePackage->select(
                'uuid_bundle_package',
                DB::raw('CASE WHEN bundle_package_image IS NULL THEN CONCAT("' . url($this->path) . '/", "blank.png") ELSE CONCAT("' . url($this->path) . '/", bundle_package_image) END as bundle_package_image'),
                'bundle_name',
                'bundle_price',
                'status as status_bundle',
            )->get();
            if (count($data) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'bundle package'), 404]));
            endif;

            /**
             * set response
             */
            $output = [];
            foreach ($data as $key => $value) :

                /**
                 * bundle package assign
                 */
                $getBundleAssign = $this->bundlePackageAssign->select('outlet_name')
                    ->join('outlets', 'bundle_package_assigns.uuid_outlet', '=', 'outlets.uuid_outlet')
                    ->where('uuid_bundle_package', $value->uuid_bundle_package)
                    ->get();

                /**
                 * bundle package item
                 */
                $getBundleItem = $this->bundlePackageItem->select('product_name')
                    ->join('items', 'bundle_package_items.uuid_item', '=', 'items.uuid_item')
                    ->where('uuid_bundle_package', $value->uuid_bundle_package)
                    ->get();

                $set = [
                    'uuid_bundle_package' => $value->uuid_bundle_package,
                    'bundle_package_image' => $value->bundle_package_image,
                    'bundle_name' => $value->bundle_name,
                    'bundle_price' => $value->bundle_price,
                    'status' => $value->status_bundle,
                    'outlet' => $getBundleAssign,
                    'item' => $getBundleItem,
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
    public function get($uuidBundlePackage)
    {
        try {

            /**
             * check bundle package
             */
            $checkBundlePackage = $this->initCheckerHelper->bundlePackageChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (is_null($checkBundlePackage)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'bundle package'), 404]));
            endif;

            /**
             * bundle package multiple
             */
            $getBundleMultiple = $this->bundlePackageMultiple->select(
                'uuid_bundle_package_multiple',
                'bundle_package_multiples.uuid_sales_type',
                'price',
                'sales_type_name'
            )
                ->join('sales_types', 'bundle_package_multiples.uuid_sales_type', '=', 'sales_types.uuid_sales_type')
                ->where(['uuid_bundle_package' => $uuidBundlePackage])
                ->first();

            /**
             * bundle package assign
             */
            $getBundleAssign = $this->bundlePackageAssign->select('uuid_bundle_package_assign', 'bundle_package_assigns.uuid_outlet', 'outlet_name')
                ->join('outlets', 'bundle_package_assigns.uuid_outlet', '=', 'outlets.uuid_outlet')
                ->where('uuid_bundle_package', $uuidBundlePackage)
                ->get();

            /**
             * bundle package item
             */
            $getBundleItem = $this->bundlePackageItem->select('uuid_bundle_package_item', 'items.uuid_item', 'qty', 'product_name')
                ->join('items', 'bundle_package_items.uuid_item', '=', 'items.uuid_item')
                ->where('uuid_bundle_package', $uuidBundlePackage)
                ->get();

            $data['bundle'] = $checkBundlePackage;
            $data['assign_outlet'] = $getBundleAssign;
            $data['item'] = $getBundleItem;
            $data['multiple'] = is_null($getBundleMultiple) ? [] : $getBundleMultiple;

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
            $uuidBundlePackage = Uuid::uuid4()->getHex();

            /**
             * save bundle package
             */
            $reqBundlePackage = collect($req)->only([
                'bundle_name',
                'bundle_price',
                'is_multiple_price',
                'status'
            ])->toArray();
            $reqBundlePackage['uuid_bundle_package'] = $uuidBundlePackage;

            /**
             * upload image
             */
            if (isset($req['bundle_package_image'])) :
                $file = $req['bundle_package_image'];
                $photo = Uuid::uuid4()->getHex() . '.' . $file->extension();
                if (!$file->move(public_path($this->path), $photo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $reqBundlePackage['bundle_package_image'] = $photo;
            endif;

            /**
             * save bundle
             */
            $saveData = $this->bundlePackage->create($reqBundlePackage);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['bundle_name']));
            endif;

            /**
             * check bundle package assign
             */
            $bundlePackageAssign = [];
            if (isset($req['uuid_outlet']) && !in_array(null, $req['uuid_outlet'], true)) :

                /**
                 * set input value bundle package assign outlet
                 */
                foreach ($req['uuid_outlet'] as $key => $value) :
                    $set = [
                        'uuid_bundle_package_assign' => Uuid::uuid4()->getHex(),
                        'uuid_bundle_package' => $uuidBundlePackage,
                        'uuid_outlet' => $value,
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($bundlePackageAssign, $set);
                endforeach;

                /**
                 * save bundle package assign outlet
                 */
                $saveBundlePackageAssign = $this->bundlePackageAssign->insert($bundlePackageAssign);
                if (!$saveBundlePackageAssign) :
                    throw new \Exception($this->outputMessage('unsaved', 'bundle package assign outlet'));
                endif;
            endif;

            /**
             * check bundle package item
             */
            if (isset($req['uuid_item']) && !in_array(null, $req['uuid_item'], true)) :
                /**
                 * set input bundle package item
                 */
                $setItem = [];
                foreach ($req['uuid_item'] as $key => $value) :
                    $set = [
                        'uuid_bundle_package_item' => Uuid::uuid4()->getHex(),
                        'uuid_bundle_package' => $uuidBundlePackage,
                        'uuid_item' => $value,
                        'qty' => $req['qty_item'][$key],
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($setItem, $set);
                endforeach;

                /**
                 * save bundle package item
                 */
                $saveBundlePackageItem = $this->bundlePackageItem->insert($setItem);
                if (!$saveBundlePackageItem) :
                    throw new \Exception($this->outputMessage('unsaved', 'bundle package item'));
                endif;
            endif;

            /**
             * bundle package multiple
             */
            if ($req['is_multiple_price'] == 'yes') :
                /**
                 * set input packƒage multiple
                 */
                $inputBundlePackage = [
                    'uuid_bundle_package' => $uuidBundlePackage,
                    'uuid_sales_type' => $req['uuid_sales_type'],
                    'price' => $req['price']
                ];

                /**
                 * save package multiple
                 */
                $saveBundlePackageMultple = $this->bundlePackageMultiple->create($inputBundlePackage);
                if (!$saveBundlePackageMultple) :
                    throw new \Exception($this->outputMessage('unsaved', 'bundle package multiple'));
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['bundle_name']), 201, null);
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
    public function update($req, $uuidBundlePackage)
    {
        DB::beginTransaction();
        try {

            /**
             * check bundle package
             */
            $checkBundlePackage = $this->initCheckerHelper->bundlePackageChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (is_null($checkBundlePackage)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'bundle package'), 404]));
            endif;

            /**
             * save bundle package
             */
            $reqBundlePackage = collect($req)->only([
                'bundle_name',
                'bundle_price',
                'is_multiple_price',
                'status'
            ])->toArray();

            /**
             * upload image
             */
            if (isset($req['bundle_package_image'])) :
                $file = $req['bundle_package_image'];
                $photo = Uuid::uuid4()->getHex() . '.' . $file->extension();

                /**
                 * check file on local storage
                 */
                $photoOld = $this->path . '/' . basename($checkBundlePackage->bundle_package_image);
                if (file_exists(public_path($photoOld)) && $photoOld != $this->path . '/blank.png') :
                    unlink(public_path($photoOld));
                endif;

                /**
                 * check directory
                 */
                if (!$file->move(public_path($this->path), $photo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $reqBundlePackage['bundle_package_image'] = $photo;
            endif;

            /**
             * update bundle
             */
            $updateData = $this->bundlePackage->where('uuid_bundle_package', $uuidBundlePackage)->update($reqBundlePackage);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('unsaved', $req['bundle_name']));
            endif;

            /**
             * check bundle assign
             * and delete data if exist
             */
            $checkBundleAssign = $this->initCheckerHelper->bundlePackageAssignChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (!is_null($checkBundleAssign)) :
                $deleteBundleAssign = $this->bundlePackageAssign->where('uuid_bundle_package', $uuidBundlePackage)->delete();
                if (!$deleteBundleAssign) :
                    throw new \Exception($this->outputMessage('undeleted', 'bundle package assign'));
                endif;
            endif;

            /**
             * check bundle package assign
             */
            $bundlePackageAssign = [];
            if (isset($req['uuid_outlet']) && !in_array(null, $req['uuid_outlet'], true)) :

                /**
                 * set input value bundle package assign outlet
                 */
                foreach ($req['uuid_outlet'] as $key => $value) :
                    $set = [
                        'uuid_bundle_package_assign' => Uuid::uuid4()->getHex(),
                        'uuid_bundle_package' => $uuidBundlePackage,
                        'uuid_outlet' => $value,
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($bundlePackageAssign, $set);
                endforeach;

                /**
                 * save bundle package assign outlet
                 */
                $saveBundlePackageAssign = $this->bundlePackageAssign->insert($bundlePackageAssign);
                if (!$saveBundlePackageAssign) :
                    throw new \Exception($this->outputMessage('unsaved', 'bundle package assign outlet'));
                endif;
            endif;

            /**
             * checker bundle item
             */
            $checkBundleItem = $this->initCheckerHelper->bundlePackageItemChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (!is_null($checkBundleItem)) :
                $deleteBundleItem = $this->bundlePackageItem->where('uuid_bundle_package', $uuidBundlePackage)->delete();
                if (!$deleteBundleItem) :
                    throw new \Exception($this->outputMessage('undeleted', 'bundle package item'));
                endif;
            endif;

            /**
             * check bundle package item
             */
            if (isset($req['uuid_item']) && !in_array(null, $req['uuid_item'], true)) :

                /**
                 * set input bundle package item
                 */
                $setItem = [];
                foreach ($req['uuid_item'] as $key => $value) :
                    $set = [
                        'uuid_bundle_package_item' => Uuid::uuid4()->getHex(),
                        'uuid_bundle_package' => $uuidBundlePackage,
                        'uuid_item' => $value,
                        'qty' => $req['qty_item'][$key],
                        'created_at' => $this->datetime,
                        'updated_at' => $this->datetime
                    ];
                    array_push($setItem, $set);
                endforeach;

                /**
                 * save bundle package item
                 */
                $saveBundlePackageItem = $this->bundlePackageItem->insert($setItem);
                if (!$saveBundlePackageItem) :
                    throw new \Exception($this->outputMessage('unsaved', 'bundle package item'));
                endif;
            endif;

            /**
             * checker bundle multiple
             */
            $checkBundleMultiple = $this->initCheckerHelper->bundlePackageMultipleChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (!is_null($checkBundleMultiple)) :
                $deleteBundleMultiple = $this->bundlePackageMultiple->where('uuid_bundle_package', $uuidBundlePackage)->delete();
                if (!$deleteBundleMultiple) :
                    throw new \Exception($this->outputMessage('undeleted', 'bundle multiple'));
                endif;
            endif;

            /**
             * bundle package multiple
             */
            if ($req['is_multiple_price'] == 'yes' && isset($req['uuid_sales_type'])) :
                /**
                 * set input packƒage multiple
                 */
                $inputBundlePackage = [
                    'uuid_bundle_package' => $uuidBundlePackage,
                    'uuid_sales_type' => $req['uuid_sales_type'],
                    'price' => $req['price']
                ];

                /**
                 * save package multiple
                 */
                $saveBundlePackageMultple = $this->bundlePackageMultiple->create($inputBundlePackage);
                if (!$saveBundlePackageMultple) :
                    throw new \Exception($this->outputMessage('unsaved', 'bundle package multiple'));
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['bundle_name']), 200, null);
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
    public function delete($uuidBundlePackage)
    {
        DB::beginTransaction();
        try {

            /**
             * check bundle package
             */
            $checkBundlePackage = $this->initCheckerHelper->bundlePackageChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (is_null($checkBundlePackage)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'bundle package'), 404]));
            endif;
            $bundleName = $checkBundlePackage->bundle_name;
            $photo = $this->path . '/' . basename($checkBundlePackage->bundle_package_image);

            /**
             * delete bundle package
             */
            $deleteData = $this->bundlePackage->where(['uuid_bundle_package' => $uuidBundlePackage])->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', $bundleName));
            endif;

            /**
             * remove upload file photo
             */
            if (file_exists(public_path($photo)) && $photo != $this->path . '/blank.png') :
                unlink(public_path($photo));
            endif;

            /**
             * check bundle assign
             * and delete data if exist
             */
            $checkBundleAssign = $this->initCheckerHelper->bundlePackageAssignChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (!is_null($checkBundleAssign)) :
                $deleteBundleAssign = $this->bundlePackageAssign->where('uuid_bundle_package', $uuidBundlePackage)->delete();
                if (!$deleteBundleAssign) :
                    throw new \Exception($this->outputMessage('undeleted', 'bundle package assign'));
                endif;
            endif;

            /**
             * checker bundle item
             */
            $checkBundleItem = $this->initCheckerHelper->bundlePackageItemChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (!is_null($checkBundleItem)) :
                $deleteBundleItem = $this->bundlePackageItem->where('uuid_bundle_package', $uuidBundlePackage)->delete();
                if (!$deleteBundleItem) :
                    throw new \Exception($this->outputMessage('undeleted', 'bundle package item'));
                endif;
            endif;

            /**
             * checker bundle multiple
             */
            $checkBundleMultiple = $this->initCheckerHelper->bundlePackageMultipleChecker(['uuid_bundle_package' => $uuidBundlePackage]);
            if (!is_null($checkBundleMultiple)) :
                $deleteBundleMultiple = $this->bundlePackageMultiple->where('uuid_bundle_package', $uuidBundlePackage)->delete();
                if (!$deleteBundleMultiple) :
                    throw new \Exception($this->outputMessage('undeleted', 'bundle multiple'));
                endif;
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $bundleName), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }
}
