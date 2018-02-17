<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLabel extends Model
{
    protected $fillable = ['name','color','task_id'];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
