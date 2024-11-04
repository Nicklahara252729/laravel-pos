<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ItemMultiplePriceVariant implements Rule
{
    protected $table;
    protected $column;
    protected $uuidOutlet;

    public function __construct($table, $column, $uuidOutlet)
    {
        $this->table = $table;
        $this->column = $column;
        $this->uuidOutlet = $uuidOutlet;
    }

    public function passes($attribute, $value)
    {
        // Ubah nilai value menjadi array jika belum
        $values = is_array($value) ? $value : [$value];

        // Periksa apakah setiap nilai ada dalam tabel data_blok
        foreach ($values as $uuidSalesType) {
            if (!DB::table($this->table)
                ->where($this->column, $uuidSalesType)
                ->where([
                    'uuid_outlet' => $this->uuidOutlet,
                ])
                ->exists()) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'The selected sales type is invalid.';
    }
}
