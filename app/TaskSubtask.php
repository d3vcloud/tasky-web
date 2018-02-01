<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskSubtask extends Model
{
    protected $fillable = ['name','isComplete','task_id'];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
