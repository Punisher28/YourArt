<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ImgItems extends Model
{
    protected $table='img_products';

    public function products_img()
    {
        return $this->belongsTo(Products::class);
    }

}
