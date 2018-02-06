<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskActivity;
use Auth;
use Illuminate\Http\Request;

class TaskActivityController extends Controller
{

    public function store(Request $request)
    {
        $activity = new TaskActivity;
        $activity->type = "message";
        $activity->message = $request->comment;
        $activity->date_time = date('Y-m-d H:i:s');
        $activity->task_id = \Session::get('idCurrentTask');
        $activity->user_id = Auth::user()->id;

        if($activity->save())
        {
            return "Saved";
        }
    }

    public function update(Request $request, TaskActivity $taskActivity)
    {
        //
    }


    public function destroy(TaskActivity $taskActivity)
    {
        //
    }
}
