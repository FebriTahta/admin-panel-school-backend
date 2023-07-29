<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
           
    protected $fillable = [
        'jurusan_id',
        'alumni_image',
        'alumni_name',
        'alumni_telp',
        'alumni_pekerjaan',
        'alumni_alamatpekerjaan',
        'alumni_tahunmasuk',
        'alumni_tahunkeluar',
        'alumni_status',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
