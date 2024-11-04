<?php

namespace App\Models\ItemLibrary\ItemCogsVariant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCogsVariant extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden  = ['id', 'created_at', 'updated_at'];
    public $checkCogs  = ['yes', 'no'];
}
