<?php

/**
 * file location
 */

namespace App\Models\User\Access;

/**
 * import component
 */

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at','uuid_outlet'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_access = (string) Uuid::uuid4()->getHex();
        });
    }
}
