<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class ProjectDetailController extends Controller
{
    public function index(Project $project)
    {
        if(!is_null($project))
        {
            \Session::put('idProject',$project->id);

            $tupcoming = Task::where('project_id',$project->id)
                ->where('status','upcoming')
                ->get();

            $tprogress = Task::where('project_id',$project->id)
                ->where('status','inprogress')
                ->get();

            $tcompleted = Task::where('project_id',$project->id)
                ->where('status','completed')
                ->get();
        }else{
            return "NOOOO";
        }

    	return view('project.detail-project',compact('tupcoming','tprogress','tcompleted'));
    }
}
