<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = ['email','token','accepted','accepted_at'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
