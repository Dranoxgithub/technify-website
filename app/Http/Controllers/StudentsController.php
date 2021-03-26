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
            $path = $resume->store(
                'resumes/'.$student->id, 's3'
            );
            // $path = $resume->store('files');
            $student->resume_url = $path;
        }

        
        
        Session::flash('message', 'Thank you for signing up! We will email you for more project info.');
        $student->save();
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
            if(Storage::disk('s3')->exists($old_resume_url) ) {
                Storage::disk('s3')->delete($old_resume_url);
            }
            $path = $resume->store(
                'resumes/'.$student->id, 's3'
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
        if( ! Storage::disk('s3')->exists($filePath) ) {
            // abort(404);
            return view('pages.noresume');
        }
        
        // $pdfContent = Storage::get($filePath);
        $pdfContent = Storage::disk('s3')->get($filePath);
       
        $type = Storage::disk('s3')->mimeType($filePath);


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
}
