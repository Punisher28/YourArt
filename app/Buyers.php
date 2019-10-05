<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyers extends Model
{
    public function products(){
       return $this->hasMany(Products::class);
    }
}
