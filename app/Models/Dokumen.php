<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $fillable = ['dokumen_name','dokumen_slug','dokumen_docs'];

    public function kesiswaan()
    {
        return $this->belongsToMany(Kesiswaan::class);
    }
}
