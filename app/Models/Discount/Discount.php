<?php

namespace App\Models\Discount;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Discount extends Model
{
    use HasFactory;
    protected $guarded       = [];
    protected $hidden        = ['id', 'created_at', 'updated_at'];
    public $amountStatus     = ['fixed', 'custom'];
    public $amountTypeFixed  = ['rupiah', 'persen'];
    public $amountTypeCustom = ['rupiah', 'persen'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_discount = (string) Uuid::uuid4()->getHex();
        });
    }
}
