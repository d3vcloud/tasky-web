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
    	$myprojects = Project::where('user_id',Auth::user()->id)->get();
    	return view('project.board',compact('myprojects'));
    }
}
