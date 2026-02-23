<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'category',
        'title',
        'image',
        'content',
        'slug',
        'hit'
    ];
    function getCategory(){
        return $this->hasOne('App\Models\Category','id','category');
    }
    
}
