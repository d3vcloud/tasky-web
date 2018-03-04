<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use App\Functions;
use Auth;
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
        $fun = new Functions;
        $type = "";
        if($request->name == "titleTask") {
            $task->name = $request->value;
            $type = "title";
        }
        else if($request->name == "descriptionTask") {
            $task->description = $request->value;
            $type = "description";
        }
        else {
            $task->due_date = $request->value;
            $type = "due date";
        }
        if($task->save())
        {
            $activity = $fun->saveActivity("edited",
                'changed the '.$type.' of this task');

            return response()->json([
                "status" => "Updated",
                "activity" => $activity,
                "username" => Auth::user()->username,
                "photo" => Auth::user()->photo,
                "user" => Auth::user()->first_name.' '.Auth::user()->last_name,
                "taskid" => $task->id,
                "taskname" => $task->name
            ]);
        }
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

        $project = Project::find(\Session::get('idProject'));

        $attachments = array();
        $activities = array();
        $members = array();

        $fun = new Functions;
        foreach ($task->task_attachments()->get() as $key => $value) {
            $end = explode('.', $value->url);
            $attachments[] = array(
                "id" => $value->id,
                "ext" => end($end),
                "url" => $value->url,
                "name" => $value->name,
                "size" => $fun->byteConvert(filesize($value->url)),
                "date" => $value->created_at
            );
        }

        foreach ($task->task_activities()->orderBy('date_time','DESC')->get()
                 as $key => $value) {
            $user = \App\User::find($value->user_id);
            $activities[] = array(
                "id" => $value->id,
                "type" => $value->type,
                "message" => $value->message,
                "date_time" => $value->date_time,
                "nameuser" => $user->first_name.' '.$user->last_name,
                "username" => $user->username,
                "photouser" => $user->photo
            );
        }

        foreach ($project->users()->orderBy('last_name','ASC')->get() as $key => $value) {
            $members[] = array(
                "id" => $value->id,
                "name" => $value->first_name,
                "last_name" => $value->last_name,
                "photo" => $value->photo
            );
        }

        return response()->json([
                "task" => $task,
                "subtasks" => $task->task_subtasks()->get(),
                "attachments" => $attachments,
                "activities" => $activities,
                "labels" => $task->task_labels()->get(),
                "members" => $members
            ]);
    }

    public function addMember(Request $request)
    {
        $task = Task::find(\Session::get('idCurrentTask'));

        if(!is_null($task))
        {
            if($request->selected)
                $task->users()->attach($request->id);
            else
                $task->users()->detach($request->id);

            return "Added";
        }
    }

    
}
