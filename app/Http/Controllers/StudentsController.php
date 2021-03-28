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
        Session::flash('message', 'Thank you for signing up! We will email you for more project info.');
        $this->temp_apply();
        return redirect('/');
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

        Session::flash('message', 'Congrats! Applied successfully.');
        return view('students.show', ['student' => $student]);
    }
}
