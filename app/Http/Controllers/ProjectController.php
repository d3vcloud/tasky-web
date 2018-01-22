<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Auth;
class ProjectController extends Controller
{
    
    public function list()
    {
        # code...
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            if($request->Action == "Register"){
                $project = new Project;
                $project->name = $request->name;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
        
}
