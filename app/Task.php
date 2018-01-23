<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','description','due_date'];

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
}
