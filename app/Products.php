<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function buyer(){
        return $this->belongsTo(Buyers::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasMany(ImgItems::class,"key");
    }

}
