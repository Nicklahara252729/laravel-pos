<?php

namespace App\Models\TableManagement\TableTransaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableTransaction extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $status          = ['reserved', 'cancelled', 'done'];
}
