<?php

namespace App\Models\PurchaseOrder\PurchaseOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden  = ['id', 'created_at', 'updated_at'];
    public $type       = ['item', 'ingredient'];
}
