<?php

namespace App\Models\Stakeholder\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden  = ['id', 'created_at', 'updated_at'];
    public $gender     = ['laki - laki', 'perempuan'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->uuid_customer = (string) Uuid::uuid4()->getHex();
        });
    }
}
