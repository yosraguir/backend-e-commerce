<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_Article extends Model
{
    protected $table="image_articles";

    public function article() {
        return $this->belongsTo('App\Models\Article');
    }
}
