<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brosur extends Model
{
    use HasFactory;

    protected $fillable = [
        'brosur_name',
        'brosur_image',
        'brosur_download',
        'brosur_highlight',
    ];
}
