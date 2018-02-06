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
        return $this->belongsToMany('App\Project','project_users')
            ->withTimestamps();
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }




}
