<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        //
    }

  
    public function store(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        //$task->save();
        return $request->all();
    }

    
    public function update(Request $request, Task $task)
    {
        //
    }

 
    public function destroy(Task $task)
    {
        //
    }
}
