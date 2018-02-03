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

    private function byteConvert($bytes)
    {
        if ($bytes == 0)
            return "0.00 B";
    
        $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($bytes, 1024));
    
        return round($bytes/pow(1024, $e), 2).' '.$s[$e];
    }


    public function getDetails(Task $task)
    {
        \Session::put('idCurrentTask',$task->id);
        $attachments = array();
        foreach ($task->task_attachments()->get() as $key => $value) {
            $end = explode('.', $value->url);
            $attachments[] = array(
                "id" => $value->id,
                "ext" => end($end),
                "url" => $value->url,
                "name" => $value->name,
                "size" => $this->byteConvert(filesize($value->url)),
                "date" => $value->created_at
            );
        }

        return response()->json([
                "task" => $task,
                "subtasks" => $task->task_subtasks()->get(),
                "attachments" => $attachments
            ]);
    }

    
}
