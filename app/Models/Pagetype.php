<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagetype extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
        'type_slug'
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
