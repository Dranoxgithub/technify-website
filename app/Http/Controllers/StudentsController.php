<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Response;
use Session;
use DateTimeZone;
use DateTime;
use Mail;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('user:student');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->student) {
                return $next($request);
            } else {
                return redirect('/student');
            }
        })->except(['store', 'show']);
    }
    public function store(Request $request)
    {
        $student = new Student();
        $student->fill(['school' => request('school'),
        'user_id' => Auth::user()->id,
        'position' => request('position'),
        'country' => request('country'),
        'timezone' => request('timezone'),
        'language' => request('language'),
        // 'min_commitment' => request('min_commitment'),
        // 'max_commitment' => request('max_commitment')
        ]);
        
        $resume = $request->file('resume');

        if ($resume != null) {
            // $path = $resume->store(
            //     'resumes/'.$student->id, 's3'
            // );
            $path = $resume->store('resumes/'.$student->user_id);
            $student->resume_url = $path;
        } else {
            return redirect()->back()->withInput();
        }
        
        $student->save();
        Session::flash('message', 'Thank you for filling out your basic info! Please review your application and click on submit when you are ready.');
        return redirect('/student');
        // return view('students.show', ['student' => $student]);
        
    }

    public function update(Request $request)
    {
        $student = Auth::user()->student;
        $student->fill(['school' => request('school'),
        'position' => request('position'),
        'country' => request('country'),
        'timezone' => request('timezone'),
        'language' => request('language'),
        // 'min_commitment' => request('min_commitment'),
        // 'max_commitment' => request('max_commitment')
        ]);
        $resume = $request->file('resume');
        if ($resume != null) { // save new resume and delete old resume
            $old_resume_url = $student->resume_url;
            if(Storage::disk()->exists($old_resume_url) ) {
                Storage::disk()->delete($old_resume_url);
            }
            $path = $resume->store(
                'resumes/'.$student->id
            );
            $student->resume_url = $path;
        }
        
        
        
        // $path = $resume->store('files');
        // $student->resume_url = $path;

        

        $student->save();
        Session::flash('message', 'Successfully updated!');
        // $request->session()->flash('status', 'Task was successful!');
        return view('students.show', ['student' => $student]);
        // return view('students.show', ['student' => $student])->with('message', 'Updated successfully.');


    }

    public function show()
    {
        $student = Auth::user()->student;
        if ($student == null) {
            $timezone_list = $this->generate_timezone_list();
            return view('students.register', ['timezone_list' => $timezone_list]);
        } else {
            return view('students.show', ['student' => $student]);
        }

    }
    public function edit()
    {
        $student = Auth::user()->student;
        $timezone_list = $this->generate_timezone_list();
        return view('students.edit', ['student' => $student, 'timezone_list' => $timezone_list]);
    }


    public function getResume()
    {
        
        
        $student = Auth::user()->student;
        $filePath = $student->resume_url;
       
        
        // file not found
        if( ! Storage::disk()->exists($filePath) ) {
            // abort(404);
            return view('pages.noresume');
        }
        
        // $pdfContent = Storage::get($filePath);
        $pdfContent = Storage::disk()->get($filePath); 
       
        $type = Storage::disk()->mimeType($filePath); 


        return Response::make($pdfContent, 200, [
        'Content-Type'        => $type,
        'Content-Disposition' => 'inline'
        ]);
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
    
    public function temp_apply() {
        $student = Auth::user()->student;
        if ($student == null) {
            abort(404);
        }
        $to_name = "Technify";
        $to_email = 'technifyinitiative@gmail.com';
        $cc_email = Auth::user()->email;

        $resume_name = Auth::user()->name.".pdf";
        $resume_link = $student->resume_url;

        
        
        $data = array("student_name" => Auth::user()->name, "student_email" => Auth::user()->email,"student" => $student);
        Mail::send("projects.temp_email_template", $data, function($message) use ($to_name, $to_email, $resume_link, $resume_name, $cc_email) {
        $message->to($to_email, $to_name)
        ->subject('New Application from '. Auth::user()->name .' 🎉-Technify')
        ->from('technifyinitiative@gmail.com','Technify')
        ->cc($cc_email);
        if ($resume_link != null && Storage::disk()->exists($resume_link)) {
            $message->attach(Storage::disk()->url($resume_link), array(
                'as' => $resume_name,
                'mime' => 'application/pdf'));
        }
        
        });

        Session::flash('message', 'Congrats! Application sent.');
        return redirect('/student');
        // return view('students.show', ['student' => $student]);
    }
}
