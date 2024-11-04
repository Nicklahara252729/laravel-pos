<?php

/**
 * file location
 */

namespace App\Models\Gratuity;

/**
 * import component
 */

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gratuity extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_gratuity = (string) Uuid::uuid4()->getHex();
        });
    }
}
