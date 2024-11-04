<?php

namespace App\Models\BundlePackage\BundlePackageMultiple;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class BundlePackageMultiple extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_bundle_package_multiple = (string) Uuid::uuid4()->getHex();
        });
    }
}
