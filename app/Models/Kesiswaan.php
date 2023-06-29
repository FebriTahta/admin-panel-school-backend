<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesiswaan extends Model
{
    use HasFactory;

    protected $fillable = ['kesiswaan_title','kesiswaan_slug','kesiswaan_desc','kesiswaan_image'];

    public function dokumen()
    {
        return $this->belongsToMany(Dokumen::class);
    }

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }
}
