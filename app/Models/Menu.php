<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'pagetype_id',
        'menu_name',
        'menu_link',
        'menu_type',
        'menu_stat',
    ];

    public function pagetype()
    {
        return $this->belongsTo(Pagetype::class);
    }
}
