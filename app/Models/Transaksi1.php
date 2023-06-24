<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'paymenttype_id',
        'transaksi1_uuid',
        'transaksi1_name',
        'transaksi1_email',
        'transaksi1_alamat',
        'transaksi1_pos',
        'transaksi1_kota',
        'transaksi1_asal',
        'transaksi1_phone',
        'transaksi1_status',
    ];

    public function paymenttype()
    {
        return $this->belongsTo(Paymenttype::class);
    }
}
