<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable= [
        'jurusan_name','jurusan_slug','jurusan_image','jurusan_desc','jurusan_anak','jurusan_kelas'
    ];
}
