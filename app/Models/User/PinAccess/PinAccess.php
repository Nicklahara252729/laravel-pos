<?php

/**
 * file location
 */

namespace App\Models\User\PinAccess;

/**
 * import component
 */

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinAccess extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_pin_access = (string) Uuid::uuid4()->getHex();
        });
    }
}
