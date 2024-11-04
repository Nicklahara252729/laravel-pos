<?php

namespace App\Models\BundlePackage\BundlePackage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundlePackage extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $isMultiplePrice = ['yes', 'no'];
    public $status          = ['active','deactive'];
}
