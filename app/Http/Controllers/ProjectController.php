<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;

use Illuminate\Http\Request;

use Auth;
class ProjectController extends Controller
{
    
    public function getAll()
    {
        $projects = Project::join('project_users as pu','projects.id','=','pu.project_id')
            ->where('pu.user_id',Auth::user()->id)->get();

        $myprojects = Project::where('user_id',Auth::user()->id)->get();    

        return response()->json([
            "myprojects" => $myprojects,
            "projects" => $projects
        ]);
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            if($request->Action == "Register"){
                $project              = new Project;
                $project->name        = $request->name;
                $project->description = $request->description;

                $user = User::find(Auth::user()->id);

                //lo guarda como propietario del proyecto
                if($user->myprojects()->save($project)){
                    //lo guarda como miembro
                    //$project->members()->attach(Auth::user()->id);
                    return "Save";
                }
                else
                    return "Error";
            }
            
        }
        return "Error";

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

    public function addUser(Request $request)
    {
        $project = Project::find($request->id);
        if(isset($request->members))
        {
            if($request->ajax())
            {
                if(!is_null($project))
                {
                    if(is_array($request->members))
                    {
                        foreach ($request->members as $member)
                        {
                            $project->members()->attach($member);
                        }
                    }else
                    {
                        $project->members()->attach($request->members);
                    }
                    return "Added";
                }
            }
        }

    }

    public function isMemberProject($idUser,$idProject)
    {
        $project = Project::find($idProject);
        if(count($project->members()->where('id',$idUser)->get()))
            return true;

        return false;
    }


    public function getFilterMembers($id)
    {
        //devuelve todos los proyectos del usuario actual a excepcion del seleccionado
        $projects = Auth::user()->myprojects->where('id','!=',$id);
        $users = array();
        foreach ($projects as $project)
        {
            //obtiene y recorre los miembros de los proyectos del usuario actual
            foreach ($project->members()->get() as $user)
            {
                //verifica si el usuario de un proyecto esta en el proyecto seleccionado
                if(!$this->isMemberProject($user->id,$id))
                {
                    $users[] = array(
                        "id" => $user->id,
                        "user" => $user->first_name . ' ' . $user->last_name
                    );
                }
            }
        }
        return array_values(array_unique($users, SORT_REGULAR));
    }
        
}
