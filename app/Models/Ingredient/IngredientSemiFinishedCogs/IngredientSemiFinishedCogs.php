<?php

namespace App\Models\Ingredient\IngredientSemiFinishedCogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientSemiFinishedCogs extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $trackCogs       = ['yes', 'no'];
}
