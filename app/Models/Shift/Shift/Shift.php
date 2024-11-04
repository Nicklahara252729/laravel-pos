<?php

namespace App\Models\Shift\Shift;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden  = ['id', 'created_at', 'updated_at'];
}
