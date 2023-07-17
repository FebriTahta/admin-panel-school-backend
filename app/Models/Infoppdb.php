<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infoppdb extends Model
{
    use HasFactory;

    protected $fillable = [
        'infoppdb_title','infoppdb_slug','infoppdb_image','infoppdb_desc','infoppdb_view','infoppdb_yearone','infoppdb_yeartwo'
    ];
}
