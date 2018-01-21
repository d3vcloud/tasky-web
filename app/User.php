<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use Notifiable;

    protected $fillable = [
        'first_name','last_name','email','username','password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
