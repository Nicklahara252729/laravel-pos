<?php

namespace App\Models\Promo\PromoPurchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoPurchase extends Model
{
    use HasFactory;
    protected $guarded   = [];
    protected $hidden    = ['id', 'created_at', 'updated_at'];
    public $purchaseType = ['item', 'category'];
}
