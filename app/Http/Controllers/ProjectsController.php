<?php

namespace App\Http\Controllers;

use App\Ngo;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    
    public function getNGOProjects()
    {
        $ngo = Auth::user()->ngo;
        
        return view('pages.NGO_project_index');
    }

    public function showAllProjects()
    {
        $projects = Project::all();
        
        return view('pages.project_listing', ['projects' => $projects]);
    }

    public function store()
    {
        
        $project = new Project();
        $project->name = request('name');
        $project->goal = request('goal');
        $project->skill = request('skill');
        $project->start_date = request('start_date');
        $project->end_date = request('end_date');
        $project->timezone = request('timezone');
        $project->country = request('country');
        $project->commitment = request('commitment');
        $project->contact_name = request('contact_name');
        $project->contact_email = request('contact_email');
        $project->description = request('description');

        $ngo = Auth::user()->ngo;
        $ngo = $ngo->projects()->save($project);
        
        
        return view('pages.NGO_project_index');
    }

    public function show($id) 
    {
        $project = Project::find($id);
        
        return view('projects.show',['project' => $project]);

    }
    public function destroy($id) 
    {
        $project = Project::find($id);

        if($project){
            $project->delete();
        }
    
        return redirect('/NGO_project_index')->with('success', 'Contact deleted!');
    }
    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit',['project' => $project]);
    }
    public function update(Request $request, $id)
    {   
        $project = Project::find($id);
        $project->name = request('name');
        $project->goal = request('goal');
        $project->skill = request('skill');
        $project->start_date = request('start_date');
        $project->end_date = request('end_date');
        $project->timezone = request('timezone');
        $project->country = request('country');
        $project->commitment = request('commitment');
        $project->contact_name = request('contact_name');
        $project->contact_email = request('contact_email');
        $project->description = request('description');
        $project->save();

        return view('projects.show',['project' => $project]);
    }

}
