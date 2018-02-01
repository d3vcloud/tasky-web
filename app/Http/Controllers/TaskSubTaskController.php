<?php

namespace App\Http\Controllers;

use App\TaskSubtask;
use App\Task;
use Illuminate\Http\Request;

class TaskSubTaskController extends Controller
{
    
    public function getll()
    {
        //
    }

    
    public function store(Request $request)
    {
        if($request->ajax()){
            $subtask = new TaskSubtask;
            $subtask->name = $request->name;

            $task = Task::find(\Session::get('idCurrentTask'));
            if($task->task_subtasks()->save($subtask))
                return $subtask->id;
        }
        return "Error";
    }

    
    public function update(Request $request, TaskSubtask $taskSubtask)
    {
        //
    }

   
    public function destroy(TaskSubtask $taskSubtask)
    {
        //
    }
}