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

    public function task_attachments()
    {
        return $this->hasMany('App\TaskAttachment');
    }

    public function task_subtasks()
    {
        return $this->hasMany('App\TaskSubtask');
    }

    public function task_activities()
    {
        return $this->hasMany('App\TaskActivity');
    }
}
