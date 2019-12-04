<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password','first_name','surname','last_name','location','tel_number','ip_address','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'person_verified' => 'boolean',
        'payment_verified' => 'boolean',
    ];

    public function isAdmin(){

        return $this->role_id == 1;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function products(){
        return $this->hasMany(Products::class);
    }

    public function image()
    {
        return $this->hasMany(ImgUsers::class);
     }
}
