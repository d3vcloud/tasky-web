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
        $request->file('file')->store('public/tasks/'.\Session::get('idCurrentTask'));
        $url = $request->file('file')
            ->store('storage/tasks/'.\Session::get('idCurrentTask'));
        
        $attachment->name = $request->file('file')->getClientOriginalName();
        $attachment->url = $url;
        
        $task = Task::find(\Session::get('idCurrentTask'));
            if ($task->task_attachments()->save($attachment)){

                $activity = new TaskActivity;
                $activity->type = "attachment";
                $activity->message = 'uploaded '.$request->file('file')->getClientOriginalName();
                $activity->date_time = date('Y-m-d H:i:s');
                $activity->task_id = \Session::get('idCurrentTask');
                $activity->user_id = Auth::user()->id;
                $activity->save();

                return "Uploaded";
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
            return "Removed";
        
        return "Error";
    }

    public function remove($id)
    {
        $attachment = TaskAttachment::find($id);
        if(!is_null($attachment)){
            $attachment->delete();
            return "Removed";
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
