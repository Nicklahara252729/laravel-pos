<?php

namespace App\Models\Modifier\Modifier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modifier extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
    public $isLimit         = ['yes', 'no'];
    public $isStock         = ['yes', 'no'];
    public $isLimitRequired = ['yes', 'no'];
}
