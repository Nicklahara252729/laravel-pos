<?php

namespace App\Models\Receipe\ReceipeSemiFinished;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceipeSemiFinished extends Model
{
    use HasFactory;
    protected $guarded      = [];
    protected $hidden       = ['id', 'created_at', 'updated_at'];
}
