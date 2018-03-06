<?php

namespace App\Http\Controllers;

use App\TaskLabel;
use App\Task;
use Illuminate\Http\Request;

class TaskLabelController extends Controller
{

    public function store(Request $request)
    {
        if($request->ajax())
        {
            $label = new TaskLabel;
            $label->name = $request->name;
            $label->color = $request->color;
            $task = Task::find(\Session::get('idCurrentTask'));
            if($task->task_labels()->save($label))
                return response()->json([
                    "status" => "Saved",
                    "label" => $label,
                    "taskid" => \Session::get('idCurrentTask')
                ]);
        }

        return "Error";
    }

}
