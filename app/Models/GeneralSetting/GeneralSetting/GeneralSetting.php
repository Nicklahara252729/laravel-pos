<?php

namespace App\Models\GeneralSetting\GeneralSetting;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_general_settings = (string) Uuid::uuid4()->getHex();
        });
    }
}
