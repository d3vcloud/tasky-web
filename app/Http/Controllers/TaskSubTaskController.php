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

    
    public function update(Request $request)
    {
        $status = 0;
        if($request->ajax()) {
            $subtask = TaskSubtask::find($request->id);
                if (!is_null($subtask)){
                    if($request->field == 'status'){
                        if($request->status == "true") $status = 1;

                        $subtask->isComplete = $status;
                    }

                    if($subtask->save())
                        return "Updated";
                }
            return $request->all();
        }
        return "Error";
    }

   
    public function destroy($id)
    {
        $subtask = TaskSubtask::find($id);
        if(!is_null($subtask))
            if($subtask->delete())
                return "Removed";

        return "Error";
    }
}
