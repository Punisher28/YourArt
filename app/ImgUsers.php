<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgUsers extends Model
{
    protected $table = 'img_users';

    public function user_img()
    {
        return $this->belongsTo(User::class);
    }
}
