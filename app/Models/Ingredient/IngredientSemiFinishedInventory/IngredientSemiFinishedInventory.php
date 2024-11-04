<?php

namespace App\Models\Ingredient\IngredientSemiFinishedInventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientSemiFinishedInventory extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $trackStock      = ['yes', 'no'];
    public $alert           = ['yes', 'no'];
}
