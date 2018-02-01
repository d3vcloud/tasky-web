<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\TaskAttachment;
use Illuminate\Support\Facades\Storage;

class TaskAttachmentController extends Controller
{
    public function upload(Request $request)
    {
        $attachment = new TaskAttachment;
        $request->file('file')->store('public/tasks/'.\Session::get('idCurrentTask'));
        $url = $request->file('file')
            ->store('storage/tasks/'.\Session::get('idCurrentTask'));
        $attachment->url = $url;
        $task = Task::find(\Session::get('idCurrentTask'));
            if ($task->task_attachments()->save($attachment)){
                return "Uploaded";
            }
        return "Error";
    }

    public function getAll()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}
