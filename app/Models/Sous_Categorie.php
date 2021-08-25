<?php

namespace App\Models;

use App\Model\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_Categorie extends Model
{
    use HasFactory;

        protected $table="sous_categories";
        protected $fillable = ['name','categorie_id'];


            public function categorie()
            {
                return $this->belongsTo('App\Models\Sous_Categorie');
            }
}
