<?php

namespace App\Models\SalesType;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesType extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $hidden   = ['id', 'created_at', 'updated_at'];
    public $salesStatus = ['active', 'deactive'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_sales_type = (string) Uuid::uuid4()->getHex();
        });
    }
}
