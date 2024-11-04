<?php

namespace App\Imports\Backoffice\Ingredient\DaftarBahan;

/**
 * import models
 */
use App\Models\Stakeholder\Customer\Customer;

/**
 * import helper
 */

 use App\Helpers\CheckerHelpers;

 /**
  * import component
  */
 
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

class ChangeImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnError
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

        return new Customer([
            'uuid_outlet'   => $checkOutlet->uuid_outlet,
            'name'          => $row['nama'],
            'email'         => $row['email'],
            'phone'         => $row['phone'],
            'birthday'      => $row['birthday'],
            'gender'        => $row['gender'],
            'address'       => $row['address'],
            'city'          => $row['city'],
            'state'         => $row['state'],
            'zip_code'      => $row['pos'],
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
