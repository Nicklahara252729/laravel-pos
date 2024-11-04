<?php

namespace App\Models\Modifier\ModifierOption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModifierOption extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $hidden   = ['id', 'created_at', 'updated_at'];
}
