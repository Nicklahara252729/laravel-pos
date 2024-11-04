<?php

namespace App\Models\Shift\ShiftTotal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftTotal extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden  = ['id', 'created_at', 'updated_at'];
    public $type       = ['expense', 'income'];
}
