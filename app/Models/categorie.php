<?php

namespace App\Models;

use App\Model\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articles()
    {
            return $this->hasMany(Article::class);
    }
}
