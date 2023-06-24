<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentcontrol extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_name',
        'payment_merchant_id',
        'payment_server_key',
        'payment_client_key'
    ];
}
