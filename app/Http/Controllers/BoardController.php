<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;
class BoardController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$myprojects = Project::join('project_users as pu','projects.id','=','pu.project_id')
            ->where('user_id',Auth::user()->id)->get();
    	return view('project.board',compact('myprojects'));
    }

    public function setTimeZone(Request $request){

        if(!(\Session::has('timezone')))
        {
            \Session::put('timezone',$request->timezone);
            return "Configured";
        }
    }
}
