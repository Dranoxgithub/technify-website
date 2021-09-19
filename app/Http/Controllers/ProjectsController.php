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

    public function showAllAvailableProjects()
    {
        $available_projects = Project::all()->filter(function ($value, $key) {
            return $value['status'] == 'recruiting';
        });
        return view('pages.available_projects', ['projects' => $available_projects]);
    }


    public function showAllPastProjects()
    {
        $past_projects = Project::all()->filter(function ($value, $key) {
            return $value['status'] == 'finished';
        });
        return view('pages.past_projects', ['projects' => $past_projects]);
    }

    public function showProjectListing()
    {
        $projects = Project::all();
        
        return view('pages.project_listing', ['projects' => $projects]);
    }

    public function store() {
        $project = new Project();
        $project->name = request('name');
        $project->goal = request('goal');
        $project->skill = request('skill');
        if (in_array('swe', request('role_group'))) {
            $project->swe_needed = true;
        } else {
            $project->swe_needed = false;
        }
        if (in_array('pm', request('role_group'))) {
            $project->pm_needed = true;
        } else {
            $project->pm_needed = false;
        }
        if (in_array('d', request('role_group'))) {
            $project->d_needed = true;
        } else {
            $project->d_needed = false;
        }
        $project->start_date = request('start_date');
        $project->end_date = request('end_date');
        $project->timezone = request('timezone');
        $project->country = request('country');
        $project->contact_name = request('contact_name');
        $project->contact_email = request('contact_email');
        $project->description = request('description');

        $ngo = Auth::user()->ngo;
        $ngo = $ngo->projects()->save($project);

        Storage::move('temp/'.Auth::user()->ngo->id, 'projects_image/'. $project->id);
        
        return redirect('/NGO');
    }

    public function create() 
    {
        $ngo = Auth::user()->ngo;
        $timezone_list = $this->generate_timezone_list();
        return view('projects.create',['ngo' => $ngo, 'timezone_list' => $timezone_list]);

    }
    public function show($id) 
    {
        $project = Project::find($id);
        // ->with('Ngo')
        return view('projects.show',['project' => $project]);

    }
    public function destroy($id) 
    {
        $project = Project::find($id);

        if ($project->ngo->id != Auth::user()->ngo->id) {
            return redirect('/NGO');
        }

        if($project){
            $project->delete();
        }
    
        return redirect('/NGO')->with('success', 'Contact deleted!');
    }
    public function edit($id)
    {
        $project = Project::find($id);
        if ($project->ngo->id != Auth::user()->ngo->id) {
            return redirect('/NGO');
        }

        $timezone_list = $this->generate_timezone_list();
        return view('projects.edit',['project' => $project, 'timezone_list' => $timezone_list]);
    }

    

    public function update(Request $request, $id)
    {   
        $project = Project::find($id);
        if ($project->ngo->id != Auth::user()->ngo->id) {
            return redirect('/NGO');
        }
        if (request('toggle_completion')) {
            $project->status = $project->status == 'recruiting' ? 'finished' : 'recruiting';

        } else {
            $project->name = request('name');
            $project->goal = request('goal');
            $project->skill = request('skill');
            if (in_array('swe', request('role_group'))) {
                $project->swe_needed = true;
            } else {
                $project->swe_needed = false;
            }
            if (in_array('pm', request('role_group'))) {
                $project->pm_needed = true;
            } else {
                $project->pm_needed = false;
            }
            if (in_array('d', request('role_group'))) {
                $project->d_needed = true;
            } else {
                $project->d_needed = false;
            }
            $project->start_date = request('start_date');
            $project->end_date = request('end_date');
            $project->timezone = request('timezone');
            $project->country = request('country');
            $project->contact_name = request('contact_name');
            $project->contact_email = request('contact_email');
            $project->description = request('description');

            if ($request->hasFile('image')) {
                Storage::move('temp/'.Auth::user()->ngo->id, 'projects_image/'. $project->id);
            }
            
        }
        $project->save();

        return view('projects.show',['project' => $project]);
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
        if ($resume_link != null && Storage::disk()->exists($resume_link)) {
            $message->attach(Storage::disk()->url($resume_link), array(
                'as' => $resume_name,
                'mime' => 'application/pdf'));
        }
        
        });

        Session::flash('message', 'Congrats! Applied successfully.');
        return view('projects.show',['project' => $project]);
    }

    public function uploadImageToS3Buffer() {
        $image_parts = explode(";base64,", $_POST['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        Storage::disk()->put('temp/' . Auth::user()->ngo->id, $image_base64, 'public');
        return response()->json(['filePath' => Storage::url('temp/' . Auth::user()->ngo->id)]);
    }

    public function generate_timezone_list() {
        $timezone_list = array(
            'Pacific/Midway'       => "(GMT-11:00) Midway Island",
            'US/Samoa'             => "(GMT-11:00) Samoa",
            'US/Hawaii'            => "(GMT-10:00) Hawaii",
            'US/Alaska'            => "(GMT-09:00) Alaska",
            'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
            'America/Tijuana'      => "(GMT-08:00) Tijuana",
            'US/Arizona'           => "(GMT-07:00) Arizona",
            'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
            'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
            'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
            'America/Mexico_City'  => "(GMT-06:00) Mexico City",
            'America/Monterrey'    => "(GMT-06:00) Monterrey",
            'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
            'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
            'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
            'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
            'America/Bogota'       => "(GMT-05:00) Bogota",
            'America/Lima'         => "(GMT-05:00) Lima",
            'America/Caracas'      => "(GMT-04:30) Caracas",
            'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
            'America/La_Paz'       => "(GMT-04:00) La Paz",
            'America/Santiago'     => "(GMT-04:00) Santiago",
            'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
            'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
            'Greenland'            => "(GMT-03:00) Greenland",
            'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
            'Atlantic/Azores'      => "(GMT-01:00) Azores",
            'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
            'Africa/Casablanca'    => "(GMT) Casablanca",
            'Europe/Dublin'        => "(GMT) Dublin",
            'Europe/Lisbon'        => "(GMT) Lisbon",
            'Europe/London'        => "(GMT) London",
            'Africa/Monrovia'      => "(GMT) Monrovia",
            'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
            'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
            'Europe/Berlin'        => "(GMT+01:00) Berlin",
            'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
            'Europe/Brussels'      => "(GMT+01:00) Brussels",
            'Europe/Budapest'      => "(GMT+01:00) Budapest",
            'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
            'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
            'Europe/Madrid'        => "(GMT+01:00) Madrid",
            'Europe/Paris'         => "(GMT+01:00) Paris",
            'Europe/Prague'        => "(GMT+01:00) Prague",
            'Europe/Rome'          => "(GMT+01:00) Rome",
            'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
            'Europe/Skopje'        => "(GMT+01:00) Skopje",
            'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
            'Europe/Vienna'        => "(GMT+01:00) Vienna",
            'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
            'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
            'Europe/Athens'        => "(GMT+02:00) Athens",
            'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
            'Africa/Cairo'         => "(GMT+02:00) Cairo",
            'Africa/Harare'        => "(GMT+02:00) Harare",
            'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
            'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
            'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
            'Europe/Kiev'          => "(GMT+02:00) Kyiv",
            'Europe/Minsk'         => "(GMT+02:00) Minsk",
            'Europe/Riga'          => "(GMT+02:00) Riga",
            'Europe/Sofia'         => "(GMT+02:00) Sofia",
            'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
            'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
            'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
            'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
            'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
            'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
            'Europe/Moscow'        => "(GMT+03:00) Moscow",
            'Asia/Tehran'          => "(GMT+03:30) Tehran",
            'Asia/Baku'            => "(GMT+04:00) Baku",
            'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
            'Asia/Muscat'          => "(GMT+04:00) Muscat",
            'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
            'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
            'Asia/Kabul'           => "(GMT+04:30) Kabul",
            'Asia/Karachi'         => "(GMT+05:00) Karachi",
            'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
            'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
            'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
            'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
            'Asia/Almaty'          => "(GMT+06:00) Almaty",
            'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
            'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
            'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
            'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
            'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
            'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
            'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
            'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
            'Australia/Perth'      => "(GMT+08:00) Perth",
            'Asia/Singapore'       => "(GMT+08:00) Singapore",
            'Asia/Taipei'          => "(GMT+08:00) Taipei",
            'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
            'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
            'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
            'Asia/Seoul'           => "(GMT+09:00) Seoul",
            'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
            'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
            'Australia/Darwin'     => "(GMT+09:30) Darwin",
            'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
            'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
            'Australia/Canberra'   => "(GMT+10:00) Canberra",
            'Pacific/Guam'         => "(GMT+10:00) Guam",
            'Australia/Hobart'     => "(GMT+10:00) Hobart",
            'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
            'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
            'Australia/Sydney'     => "(GMT+10:00) Sydney",
            'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
            'Asia/Magadan'         => "(GMT+12:00) Magadan",
            'Pacific/Auckland'     => "(GMT+12:00) Auckland",
            'Pacific/Fiji'         => "(GMT+12:00) Fiji",
        );
        return $timezone_list;
    }

}
