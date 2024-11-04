<?php

namespace App\Models\Settings\ReceiptSettings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ReceiptSettings extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_receipt_settings = (string) Uuid::uuid4()->getHex();
        });
    }
}
