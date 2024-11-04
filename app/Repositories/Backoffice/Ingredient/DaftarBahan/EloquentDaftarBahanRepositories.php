<?php

namespace App\Repositories\Backoffice\Ingredient\DaftarBahan;

/**
 * component collection 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Ramsey\Uuid\Uuid;
use Maatwebsite\Excel\Facades\Excel;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;

/**
 * models collection
 */

use App\Models\Ingredient\IngredientLibrary\IngredientLibrary;

/**
 * helpers Collection
 */

use App\Helpers\CheckerHelpers;

/**
 * import export collection
 */

use App\Imports\Backoffice\Ingredient\DaftarBahan\ChangeImport;
use App\Imports\Backoffice\Ingredient\DaftarBahan\ReplaceImport;

/**
 * repositories collection
 */

use App\Repositories\Backoffice\Ingredient\DaftarBahan\DaftarBahanRepositories;

class EloquentDaftarBahanRepositories implements DaftarBahanRepositories
{
    use Message, Response;

    private $initCheckerHelper;
    private $path;
    private $ingredientLibrary;

    public function __construct(
        CheckerHelpers $initCheckerHelper,
        IngredientLibrary $ingredientLibrary
    ) {
        /**
         * initialize helper
         */
        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize model
         */
        $this->ingredientLibrary = $ingredientLibrary;

        /**
         * static value
         */
        $this->path = path('ingredient');
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
            $dataIngredientCategory = $this->ingredientLibrary->select(
                'ingredient_libraries.uuid_ingredient_library',
                'ingredient_libraries.ingredient_name',
                DB::raw("'0' as stok_tersedia"),
                DB::raw("'0' as stok_terendah"),
                DB::raw("'Kilogram (kg)' as satuan_pengukuran"),
                'category_name',
                DB::raw('CASE WHEN photo IS NULL THEN CONCAT("' . url(path('ingredient')) . '/", "blank.png") ELSE CONCAT("' . url(path('ingredient')) . '/", photo) END as photo'),
                DB::raw("'100000' as harga"),
            )
                ->join('ingredient_categories', 'ingredient_libraries.uuid_ingredient_category', '=', 'ingredient_categories.uuid_ingredient_category')
                ->where(["ingredient_libraries.uuid_outlet" => $uuid_outlet])
                ->paginate(10);
            if (count($dataIngredientCategory) <= 0) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'daftar bahan'), 404]));
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

            /**
             * form data
             */
            $uuidIngredientLibrary = Uuid::uuid4()->getHex();
            $req['uuid_ingredient_library'] = $uuidIngredientLibrary;

            /**
             * upload file foto
             */
            if (isset($req['photo'])) :
                $file = $req['photo'];
                $photo = Uuid::uuid4()->getHex() . '.' . $file->extension();
                if (!$file->move(public_path($this->path), $photo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $req['photo'] = $photo;
            endif;

            /**
             * save ingrdient library
             */
            $saveData = $this->ingredientLibrary->create($req);
            if (!$saveData) :
                throw new \Exception($this->outputMessage('unsaved', $req['ingredient_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('saved', $req['ingredient_name']), 201, null);
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
    public function update($req, $uuidIngredientLibrary, $uuid_outlet)
    {
        DB::beginTransaction();
        try {

            /**
             * form request
             */
            $reqDaftarBahan = collect($req)->except(['_method'])->toArray();

            /**
             * check data
             */
            $getDaftarBahan = $this->initCheckerHelper->daftarBahanChecker([
                "uuid_ingredient_library" => $uuidIngredientLibrary,
                "uuid_outlet" => $uuid_outlet
            ]);
            if (is_null($getDaftarBahan)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'daftar bahan'), 404]));
            endif;

            /**
             * upload file foto
             */
            if (isset($req['photo'])) :
                $file = $req['photo'];
                $photo = Uuid::uuid4()->getHex() . '.' . $file->extension();

                /**
                 * check file on local storage
                 */
                $photoOld = $this->path . '/' . basename($getDaftarBahan->photo);
                if (file_exists(public_path($photoOld)) && $photoOld != $this->path . '/blank.png') :
                    unlink(public_path($photoOld));
                endif;

                /**
                 * check directoty
                 */
                if (!$file->move(public_path($this->path), $photo)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $reqDaftarBahan['photo'] = $photo;
            endif;

            /**
             * update process
             */
            $updateData = $this->ingredientLibrary->where([
                'uuid_ingredient_library' => $uuidIngredientLibrary,
                'uuid_outlet' => $uuid_outlet
            ])->update($reqDaftarBahan);
            if (!$updateData) :
                throw new \Exception($this->outputMessage('update fail', $req['ingredient_name']));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', $req['ingredient_name']), 200, null);
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
    public function delete($uuidIngredientLibrary, $uuid_outlet)
    {
        DB::beginTransaction();
        try {
            /**
             * check data
             */
            $getDaftarBahan = $this->initCheckerHelper->daftarBahanChecker([
                'uuid_ingredient_library' => $uuidIngredientLibrary,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getDaftarBahan)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'yang akan dihapus'), 404]));
            endif;
            $daftarBahan = $getDaftarBahan->ingredient_name;
            $photo = $this->path . '/' . basename($getDaftarBahan->photo);

            /**
             * delete data
             */

            $deleteData = $this->ingredientLibrary->where([
                'uuid_ingredient_library' => $uuidIngredientLibrary,
                'uuid_outlet' => $uuid_outlet
            ])->delete();
            if (!$deleteData) :
                throw new \Exception($this->outputMessage('undeleted', $daftarBahan));
            endif;

            /**
             * remove upload file photo
             */
            if (file_exists(public_path($photo)) && $photo != $this->path . '/blank.png') :
                unlink(public_path($photo));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('deleted', $daftarBahan), 200, null);
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
    public function get($uuidIngredientLibrary, $uuid_outlet)
    {
        try {
            $getIngredient = $this->initCheckerHelper->daftarBahanChecker([
                'uuid_ingredient_library' => $uuidIngredientLibrary,
                'uuid_outlet' => $uuid_outlet
            ]);
            if (is_null($getIngredient)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'daftar bahan'), 404]));
            endif;
            $getIngredient['category_name'] = 'Tes Kategori bahan';
            $getIngredient['bahan'] = [
                [
                    'bahan' => 'bahan 1',
                    'satuan' => 'Kilogram (kg)',
                    'jumlah' => 10,
                    'hpp' => 10000
                ],
                [
                    'bahan' => 'bahan 2',
                    'satuan' => 'Kilogram (kg)',
                    'jumlah' => 20,
                    'hpp' => 20000
                ],
            ];
            $getIngredient['stock'] = [
                [
                    'variant' => 'variant 1',
                    'current_stock' => 10,
                    'minimal_stock' => 1
                ],
                [
                    'variant' => 'variant 2',
                    'current_stock' => 20,
                    'minimal_stock' => 2
                ],
            ];

            $response = $this->sendResponse(null, 200, $getIngredient);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }

        return $response;
    }

    /**
     * import replace data daftar bahan
     */
    public function importReplace($request)
    {
        try {
            $imported = Excel::import(new ReplaceImport, $request);

            if (!$imported) :
                throw new \Exception($this->outputMessage('fail import', 'daftar bahan'));
            endif;
            $response = $this->sendResponse($this->outputMessage('imported', 'daftar bahan'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * import change data daftar bahan
     */
    public function importChange($request)
    {
        try {
            $imported = Excel::import(new ChangeImport, $request);

            if (!$imported) :
                throw new \Exception($this->outputMessage('fail import', 'daftar bahan'));
            endif;
            $response = $this->sendResponse($this->outputMessage('imported', 'daftar bahan'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Throwable $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
