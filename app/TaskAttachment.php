<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAttachment extends Model
{
    protected $fillable = ['url','task_id'];
    
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
