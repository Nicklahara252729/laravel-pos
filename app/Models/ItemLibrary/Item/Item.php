<?php

namespace App\Models\ItemLibrary\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $condition       = ['new', 'refurbished', 'used'];
    public $weightUnit      = ['gr', 'kg'];
    public $dimensionUnit   = ['m', 'cm', 'inch'];
    public $isPreOrder      = ['yes', 'no'];
    public $isMultiplePrice = ['yes', 'no'];
}