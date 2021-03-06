<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\TaskAttachment;
use App\Functions;
use App\TaskActivity;
use Auth;
use Illuminate\Support\Facades\Storage;

class TaskAttachmentController extends Controller
{
    public function upload(Request $request)
    {
        $attachment = new TaskAttachment;
        $fun = new Functions;
        $request->file('file')->store('public/tasks/'.\Session::get('idCurrentTask'));
        $url = $request->file('file')
            ->store('storage/tasks/'.\Session::get('idCurrentTask'));
        
        $attachment->name = $request->file('file')->getClientOriginalName();
        $attachment->url = $url;
        
        $task = Task::find(\Session::get('idCurrentTask'));
            if ($task->task_attachments()->save($attachment)){
                $message = 'uploaded file: '.$request->file('file')->getClientOriginalName();

                $activity = $fun->saveActivity("attachment",$message);

                return response()->json([
                    "status" => "Uploaded",
                    "activity" => $activity,
                    "username" => Auth::user()->username,
                    "photo" => Auth::user()->photo,
                    "user" => Auth::user()->first_name.' '.Auth::user()->last_name,
                    "taskid" => \Session::get('idCurrentTask'),
                    "count" => Task::find(\Session::get('idCurrentTask'))
                        ->task_attachments()
                        ->count()
                ]);
            }
        return "Error";
    }

    public function getAll()
    {
        $task = Task::find(\Session::get('idCurrentTask'));
        $attachments = array();
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
        return $attachments;
    }

    public function removeAll()
    {
        $task = Task::find(\Session::get('idCurrentTask'));
        if($task->task_attachments()->delete())
        {
            return response()->json([
                "status" => "Removed",
                "taskid" => \Session::get('idCurrentTask')
            ]);
        }
        
        return "Error";
    }

    public function remove($id)
    {
        $fun = new Functions;
        $attachment = TaskAttachment::find($id);
        if(!is_null($attachment)){
            if($attachment->delete())
            {
                $message = 'removed file: '.$attachment->name;

                $activity = $fun->saveActivity("attachment",$message);

                return response()->json([
                    "status" => "Removed",
                    "activity" => $activity,
                    "username" => Auth::user()->username,
                    "photo" => Auth::user()->photo,
                    "user" => Auth::user()->first_name.' '.Auth::user()->last_name,
                    "taskid" => \Session::get('idCurrentTask'),
                    "count" => Task::find(\Session::get('idCurrentTask'))
                        ->task_attachments()
                        ->count()
                ]);
            }
            //return "Removed";
        }
        return "Error";
    }

    public function download($id)
    {
        $attachment = TaskAttachment::find($id);
        if(!is_null($attachment)){
            return response()->download(storage_path("app/".$attachment->url),$attachment->name);
        }
        return "Error";
        
    }
}
