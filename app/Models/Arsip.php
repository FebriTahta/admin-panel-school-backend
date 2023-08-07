<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategoribuku_id',
        'arsip_name',
        'arsip_slug',
        'arsip_file',
        'arsip_download',
        'arsip_image'
    ];

    public function kategoribuku()
    {
        return $this->belongsTo(Kategoribuku::class);
    }
}
