<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_name','kategori_slug'
    ];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    public function kesiswaan()
    {
        return $this->belongsToMany(Kesiswaan::class);
    }
}
