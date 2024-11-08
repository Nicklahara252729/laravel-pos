<?php

namespace App\Models\EmailNotificationRecipient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailNotificationRecipient extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
