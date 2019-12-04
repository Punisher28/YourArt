<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products(){
      return  $this->hasMany(Products::class);
    }
    public function childs(){
        return $this->hasMany(Category::class, 'parent_id','id');
    }
}
