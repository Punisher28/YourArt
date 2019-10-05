<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /*protected $fillable = [
        'id','name','full_name'
    ];*/
    //
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
