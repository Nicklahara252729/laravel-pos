<?php

namespace App\Models\Transaction\TransactionRefund;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionRefund extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $hidden   = ['id', 'created_at', 'updated_at'];
    public $reason      = ['returned goods', 'accidental charge', 'cancelled order', 'other'];
}
