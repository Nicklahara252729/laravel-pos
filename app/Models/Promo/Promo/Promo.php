<?php

namespace App\Models\Promo\Promo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $hidden   = ['id', 'created_at', 'updated_at'];
    public $promoType   = ['discount','free','price cut'];
    public $rewardType  = ['currency','percent'];
    public $config      = ['multiple','time periode'];
}
