<?php

namespace App\Models\Invoice\InvoiceRecordPayment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceRecordPayment extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $hidden   = ['id', 'created_at', 'updated_at'];
    public $paymentType = ["cash", "check", "bank transfer", "other"];
}
