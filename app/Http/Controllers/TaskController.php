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
                return response()->json([
                    "status" => "Saved",
                    "id" => $task->id
                ]);
        }
        return "Error";
        
    }

    
    public function update(Request $request)
    {
        $task = Task::find(\Session::get('idCurrentTask'));
        if($request->name == "titleTask")
            $task->name = $request->value;
        else if($request->name == "descriptionTask")
            $task->description = $request->value;
        else
            $task->due_date = $request->value;

        if($task->save())
            return "Updated";
        else
            return "Error";
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

    public function getDetails(Task $task)
    {
        \Session::put('idCurrentTask',$task->id);
        return $task;
    }

    
}
