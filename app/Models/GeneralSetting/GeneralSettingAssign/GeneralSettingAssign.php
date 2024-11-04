<?php

namespace App\Models\GeneralSetting\GeneralSettingAssign;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettingAssign extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_general_setting_assign = (string) Uuid::uuid4()->getHex();
        });
    }
}
