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
        $activity->message = 'commented: '.$request->comment;
        $activity->date_time = \Carbon\Carbon::now(\Session::get('timezone'));
        $activity->task_id = \Session::get('idCurrentTask');
        $activity->user_id = Auth::user()->id;

        if($activity->save())
        {
            return response()->json([
                "status" => "Saved",
                "activity" => $activity,
                "username" => Auth::user()->username,
                "photo" => Auth::user()->photo,
                "user" => Auth::user()->first_name.' '.Auth::user()->last_name
            ]);
        }
    }

}
