<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use App\Functions;
use App\User;

use Auth;

use App\Mail\SendNotification;

use Illuminate\Support\Facades\Mail;
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
        }else if($request->name == "status")
        {
            $taskDrop = Task::find($request->id);
            $taskDrop->status = $request->value;
            if($taskDrop->save()) {
                return "Updated";
            }
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

    public function isMember($task,$idUser)
    {
        $isMember = $task->users()->where('id',$idUser)->first();
        if(!is_null($isMember))
            return true;

        return false;
    }

    
    public function getDetails(Task $task)
    {
        \Session::put('idCurrentTask',$task->id);

        $project = Project::find(\Session::get('idProject'));

        $attachments = array();
        $activities = array();
        $members = array();
        $membersTask = array();

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

        foreach ($project->members()->orderBy('last_name','ASC')->get() as $key => $value)
        {
            $members[] = array(
                "id" => $value->id,
                "name" => $value->first_name,
                "last_name" => $value->last_name,
                "photo" => $value->photo,
                "isMember" => $this->isMember($task,$value->id)
            );
        }

        foreach ($task->users()->orderBy('last_name','ASC')->get() as $key => $value)
        {
            $membersTask[] = array(
                "id" => $value->id,
                "photo" => $value->photo,
                "lastname" => $value->last_name
            );
        }

        return response()->json([
                "task" => $task,
                "subtasks" => $task->task_subtasks()->get(),
                "attachments" => $attachments,
                "activities" => $activities,
                "labels" => $task->task_labels()->get(),
                "members" => $members,
                "membersTask" => $membersTask
        ]);
    }

    public function addMember(Request $request)
    {
        $task = Task::find(\Session::get('idCurrentTask'));

        if(!is_null($task))
        {
            $email = User::select('email')->where('id',$request->id)->first();
            if($request->selected) {
                $task->users()->attach($request->id);
                Mail::to($email)->send(new SendNotification("has added you from the task: ".$task->name));
            }
            else{
                $task->users()->detach($request->id);
                Mail::to($email)->send(new SendNotification("has eliminated you from the task: ".$task->name));
            }

            return response()->json([
                "status" => "Success",
                "user" => \App\User::select('id','last_name','photo')
                        ->where('id',$request->id)->first(),
                "taskid" => \Session::get('idCurrentTask')
            ]);

        }
        return "Error";
    }

    public function removeMember(Request $request)
    {
        $task = Task::find($request->idTask);
        if(!is_null($task))
        {
            $task->users()->detach($request->idUser);
            $email = User::select('email')->where('id',$request->idUser)->first();
            Mail::to($email)->send(new SendNotification("has eliminated you from the task: ".$task->name));
            return "Success";

        }
        return "Error";
    }
}
