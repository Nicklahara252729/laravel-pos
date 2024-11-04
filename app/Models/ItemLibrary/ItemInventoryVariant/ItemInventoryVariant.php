<?php

namespace App\Models\ItemLibrary\ItemInventoryVariant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInventoryVariant extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $hidden   = ['id', 'created_at', 'updated_at'];
    public $trackStock  = ['yes', 'no'];
    public $alert       = ['yes', 'no'];
}
