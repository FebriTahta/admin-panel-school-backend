<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_title','news_slug','news_image','news_desc'
    ];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }
}
