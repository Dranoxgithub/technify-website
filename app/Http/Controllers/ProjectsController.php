<?php

namespace App\Http\Controllers;

use App\Ngo;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mail;
use Session;
use DateTimeZone;
use DateTime;

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
        // $project->commitment = request('commitment');
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
        $timezone_list = $this->generate_timezone_list();
        return view('projects.edit',['project' => $project, 'timezone_list' => $timezone_list]);
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
        // $project->commitment = request('commitment');
        $project->contact_name = request('contact_name');
        $project->contact_email = request('contact_email');
        $project->description = request('description');
        $project->save();

        return view('projects.show',['project' => $project]);
    }

    public function search() {
        $keyword = request()->input('q');
        $projects = Project::where ( 'name', 'ilike', '%' . $keyword . '%' )
        ->orWhere ( 'goal', 'ilike', '%' . $keyword . '%' )
        ->orWhere ( 'skill', 'ilike', '%' . $keyword . '%' )
        ->orWhere ( 'start_date', 'ilike', '%' . $keyword . '%' )
        ->orWhere ( 'end_date', 'ilike', '%' . $keyword . '%' )
        ->orWhere ( 'timezone', 'ilike', '%' . $keyword . '%' )
        // ->orWhere ( 'commitment', 'ilike', '%' . $keyword . '%' )
        ->orWhere ( 'contact_name', 'ilike', '%' . $keyword . '%' )
        ->orWhere ( 'contact_email', 'ilike', '%' . $keyword . '%' )
        ->orWhere ( 'description', 'ilike', '%' . $keyword . '%' )
        ->get();

        $ngos = NGO::where ( 'name', 'ilike', '%' . $keyword . '%' )
                        ->orWhere ( 'cause', 'ilike', '%' . $keyword . '%' )
                        ->orWhere ( 'website', 'ilike', '%' . $keyword . '%' )
                        ->get();

        foreach ($ngos as $ngo)
        {
            $projects = $projects->merge($ngo->projects);
        }
        return view('pages.project_listing', ['projects' => $projects]);

    }

    public function apply($id) {
        $student = Auth::user()->student;
        if ($student == null) {
            abort(404);
        }
        // $project = Project::find($id);
        // $to_name = $project->ngo->name;
        // $to_email = $project->contact_email;
        // $cc_email = Auth::user()->email;
        $project = "New Application from " . Auth::user()->name;
        $to_name = "Technify";
        $to_email = 'technifyinitiative@gmail.com';
        $cc_email = Auth::user()->email;

        $resume_name = Auth::user()->name.".pdf";
        $resume_link = $student->resume_url;

        
        
        $data = array('project_name'=>$project->name, "ngo_name" => $to_name, "student_name" => Auth::user()->name, "student_email" => Auth::user()->email,"student" => $student);
        Mail::send("projects.email_template", $data, function($message) use ($to_name, $to_email, $project, $resume_link, $resume_name, $cc_email) {
        $message->to($to_email, $to_name)
        ->subject('New Application for '. $project->name .' 🎉-Technify')
        ->from('technifyinitiative@gmail.com','Technify')
        ->cc($cc_email);
        if ($resume_link != null && Storage::disk('s3')->exists($resume_link)) {
            $message->attach(Storage::disk('s3')->url($resume_link), array(
                'as' => $resume_name,
                'mime' => 'application/pdf'));
        }
        
        });

        Session::flash('message', 'Congrats! Applied successfully.');
        return view('projects.show',['project' => $project]);
    }

    public function generate_timezone_list() {
        static $regions = array(
            DateTimeZone::AFRICA,
            DateTimeZone::AMERICA,
            DateTimeZone::ANTARCTICA,
            DateTimeZone::ASIA,
            DateTimeZone::ATLANTIC,
            DateTimeZone::AUSTRALIA,
            DateTimeZone::EUROPE,
            DateTimeZone::INDIAN,
            DateTimeZone::PACIFIC,
        );
        $timezones = array();
        foreach( $regions as $region )
        {
            $timezones = array_merge( $timezones, DateTimeZone::listIdentifiers( $region ) );
        }

        $timezone_offsets = array();
        foreach( $timezones as $timezone )
        {
            $tz = new DateTimeZone($timezone);
            $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
        }

        // sort timezone by offset
        ksort($timezone_offsets);

        $timezone_list = array();
        foreach( $timezone_offsets as $timezone => $offset )
        {
            $offset_prefix = $offset < 0 ? '-' : '+';
            $offset_formatted = gmdate( 'H:i', abs($offset) );

            $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

            $timezone_list[$timezone] = "$timezone (${pretty_offset})";
        }
        return $timezone_list;
    }

}
