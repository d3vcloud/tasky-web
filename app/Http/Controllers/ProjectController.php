<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Auth;
class ProjectController extends Controller
{
    
    public function getAll()
    {
        $projects = Project::select('id','name','description')
                ->where('user_id',Auth::user()->id)
                ->get();
                
        return $projects;
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            if($request->Action == "Register"){
                $project              = new Project;
                $project->name        = $request->name;
                $project->description = $request->description;

                $user = \App\User::find(Auth::user()->id);

                if($user->projects()->save($project))
                    return "Save";
                else
                    return "Error";
            }
            
        }
        return "Error";

    }

    public function update(Request $request, Project $project)
    {
        //
    }

    public function destroy(Project $project)
    {
        $selected = Project::find($project->id);
        if(!is_null($selected)){
            $selected->delete();
            return "Removed";
        }

        return "Error";
    }
        
}
