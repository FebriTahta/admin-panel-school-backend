<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoribuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategoribuku_name','kategoribuku_slug'
    ];

    public function arsip()
    {
        return $this->hasMany(Arsip::class);
    }
}
