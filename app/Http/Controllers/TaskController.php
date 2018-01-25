<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  
    public function store(Request $request)
    {
        if($request->ajax()){
            $task = new Task;
            $task->name = $request->task;
            $task->status = 'upcoming';

            $project = Project::find(\Session::get('idProject'));
            if($project->tasks()->save($task))    
                return "Saved";
        }
        return "Error";
        
    }

    
    public function update(Request $request, Task $task)
    {
        //
    }

 
    public function destroy(Task $task)
    {
        $selected = Task::find($task->id);
        if(!is_null($selected)){
            $selected->delete();
            return "Removed";
        }

        return "Error";
    }
}
