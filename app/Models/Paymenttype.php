<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymenttype extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_name',
        'payment_desc',
        'payment_value',
        'payment_status',
        'payment_image',
        'payment_thumbnail'
    ];

    public function transaksi1()
    {
        return $this->hasMany(Transaksi1::class);
    }
}
