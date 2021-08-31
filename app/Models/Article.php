<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table="articles";
    protected $fillable = ['name','price','description','brand','image','categorie_id'];


    public function categorie()
    {
        return $this->belongsTo('App\Article');
    }
    public function image_articles()
    {
        return $this->hasMany('App\Models\Image_Article');
    }
}
