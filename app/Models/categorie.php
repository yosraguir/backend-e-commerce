<?php

namespace App\Models;

use App\Model\Sous_Categorie;
use App\Model\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{

    protected $table ="categories" ;

    public function articles()
    {
            return $this->hasMany('App\Article');
    }
    public function sous_categories()
        {
                return $this->hasMany('App\Models\Sous_Categorie');
        }
}
