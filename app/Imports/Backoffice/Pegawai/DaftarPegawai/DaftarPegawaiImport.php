<?php

namespace App\Imports\Backoffice\Pegawai\DaftarPegawai;

/**
 * import models
 */

use App\Models\User\User\User;

/**
 * import helper
 */

use App\Helpers\CheckerHelpers;

/**
 * import component
 */

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Throwable;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class DaftarPegawaiImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $checkerHelper = new CheckerHelpers;

        /**
         * check outlet
         */
        $checkOutlet = $checkerHelper->outletChecker(['outlet_name' => $row['outlet']]);
        if (is_null($checkOutlet)) :
            throw new Exception("Outlet not found for name: {$row['outlet']}");
        endif;

        /**
         * check hak akses
         */
        $checkHakAkses = $checkerHelper->accessChecker(['access_name' => $row['akses'], 'uuid_outlet' => $checkOutlet->uuid_outlet]);
        if (is_null($checkHakAkses)) :
            throw new Exception("Access not found for name: {$row['akses']}");
        endif;

        return new User([
            'uuid_user'   => Uuid::uuid4()->getHex(),
            'uuid_outlet'   => $checkOutlet->uuid_outlet,
            'uuid_access'   => $checkHakAkses->uuid_access,
            'name'          => $row['nama'],
            'email'         => $row['email'],
            'phone'         => $row['phone'],
            'pin'           => $row['pin'],
            'level'         => $row['level'],
            'password'      => Hash::make($row['password'])
        ]);
    }

    public function rules(): array
    {
        return [
            // '1' => Rule::in(['patrick@maatwebsite.nl'])
        ];
    }

    public function onError(Throwable $e)
    {
        if ($e instanceof ValidationException) {
            foreach ($e->errors() as $row => $errors) {
                foreach ($errors as $error) {
                    Log::error("Validation error: {$error} at row {$row}");
                }
            }
        } else {
            Log::error("Import error: {$e->getMessage()}");
        }

        // Halt the import process by rethrowing the exception
        throw $e;
    }
}
