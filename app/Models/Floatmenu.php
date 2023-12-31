<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floatmenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'floatmenus_name',
        'floatmenus_link',
        'floatmenus_icon'
    ];
}
