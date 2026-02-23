<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function artcileCount(){
        return $this->hasMany('App\Models\Article','category','id')->count();
    }
}
