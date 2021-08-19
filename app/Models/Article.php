<?php

namespace App\Models;

use App\Model\Categorie;
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
}
