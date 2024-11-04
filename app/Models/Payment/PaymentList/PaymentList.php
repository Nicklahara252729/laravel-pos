<?php

namespace App\Models\Payment\PaymentList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentList extends Model
{
    use HasFactory;
    protected $guarded   = [];
    protected $hidden    = ['id', 'created_at', 'updated_at'];
    public $isSubPayment = ['yes','no'];
}
