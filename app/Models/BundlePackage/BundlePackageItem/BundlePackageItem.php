<?php

namespace App\Models\BundlePackage\BundlePackageItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundlePackageItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
