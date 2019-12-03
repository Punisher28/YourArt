<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'article', 'category_id', 'name','description','price','size','author'
    ];
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
