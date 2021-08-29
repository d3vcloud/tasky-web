<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

use Auth;

class ProjectDetailController extends Controller
{
    public function index(Project $project)
    {
        if(!is_null($project))
        {
            //validar si es del usuario
            $isProject = Auth::user()->projects()->where('id',$project->id)->first();
            $isMyProject = Auth::user()->myprojects()->where('id',$project->id)->first();
            if(is_null($isProject) && is_null($isMyProject))
                abort('403');
            else{
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
            }

        }

    	return view('project.detail-project',compact('tupcoming','tprogress','tcompleted'));
    }
}
