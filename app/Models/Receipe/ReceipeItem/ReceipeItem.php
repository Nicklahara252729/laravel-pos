<?php

namespace App\Models\Receipe\ReceipeItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceipeItem extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
}
