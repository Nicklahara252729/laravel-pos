<?php

namespace App\Models\TableManagement\TableInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableInfo extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $bentukMeja      = ['petak', 'lingkaran'];
    public $status          = ['tersedia', 'dipesan', 'dipakai'];
}
