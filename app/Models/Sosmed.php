<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    use HasFactory;

    protected $fillable = [
        'sosmed_name',
        'sosmed_icon',
        'sosmed_link'
    ];
}
