<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectDetailController extends Controller
{
    public function index(Project $project)
    {
    	return view('project.detail-project');
    }
}
