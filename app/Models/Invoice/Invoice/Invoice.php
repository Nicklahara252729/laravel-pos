<?php

namespace App\Models\Invoice\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $hidden   = ['id', 'created_at', 'updated_at'];
    public $status      = ['cancelled', "unpaid", "overdue", "paid", 'partially paid'];
}
