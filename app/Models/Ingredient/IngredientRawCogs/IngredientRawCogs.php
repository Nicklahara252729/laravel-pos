<?php

namespace App\Models\Ingredient\IngredientRawCogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientRawCogs extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $trackCogs       = ['yes', 'no'];
}
