<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','description'];

    public function members()
    {
    	return $this->belongsToMany('App\User','project_users')
            ->withTimestamps();
    }

    public function tasks()
    {
    	return $this->hasMany('App\Task');
    }

    public function invites()
    {
        return $this->hasMany('App\Invite');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
