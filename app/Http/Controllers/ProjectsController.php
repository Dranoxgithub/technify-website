<?php

namespace App\Http\Controllers;

use App\Ngo;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

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
        $project->country = request('timezone');
        $project->commitment = request('commitment');
        $project->contact_name = request('contact_name');
        $project->contact_email = request('contact_email');
        $project->description = request('description');
        $project->save();

        return view('projects.show',['project' => $project]);
    }

    public function search() {
        $keyword = request()->input('q');
        $projects = Project::where ( 'name', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'goal', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'skill', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'start_date', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'end_date', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'timezone', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'commitment', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'contact_name', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'contact_email', 'LIKE', '%' . $keyword . '%' )
        ->orWhere ( 'description', 'LIKE', '%' . $keyword . '%' )
        ->get();

        $ngos = NGO::where ( 'name', 'LIKE', '%' . $keyword . '%' )
                        ->orWhere ( 'cause', 'LIKE', '%' . $keyword . '%' )
                        ->orWhere ( 'website', 'LIKE', '%' . $keyword . '%' )
                        ->get();

        foreach ($ngos as $ngo)
        {
            $projects = $projects->merge($ngo->projects);
        }
        return view('pages.project_listing', ['projects' => $projects]);

    }

    public function apply($id) {
        $project = Project::find($id);
        $to_name = $project->ngo->name;
        // $to_email = 'chenanni02@gmail.com';
        $to_email = $project->contact_name;
        $student = Auth::user()->student;
        if ($student == null) {
            abort(404);
        }
        $data = array('project_name'=>$project->name, "ngo_name" => $to_name, "student_name" => Auth::user()->name, "student_email" => Auth::user()->email,"student" => $student);
        Mail::send("projects.email_template", $data, function($message) use ($to_name, $to_email, $project) {
        $message->to($to_email, $to_name)
        ->subject('New Application for '. $project->name .' 🎉');
        $message->from('technifyinitiative@gmail.com','Technify');
        
        });
        return view('projects.show',['project' => $project]);
    }
}
