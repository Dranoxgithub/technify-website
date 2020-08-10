<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Response;

class StudentsController extends Controller
{
    public function store(Request $request)
    {
        $student = new Student();
        $student->fill(['school' => request('school'),
        'user_id' => Auth::user()->id,
        'position' => request('position'),
        'country' => request('country'),
        'timezone' => request('timezone'),
        'language' => request('language'),
        'min_commitment' => request('min_commitment'),
        'max_commitment' => request('max_commitment')
        ]);
        
        $resume = $request->file('resume');

        if ($resume != null) {
            $path = $resume->store(
                'resumes/'.$student->id, 's3'
            );
            // $path = $resume->store('files');
            $student->resume_url = $path;
        }

        
        

 
        
        $student->save();
        return view('students.show', ['student' => $student]);
        
    }

    public function update(Request $request)
    {
        $student = Auth::user()->student;
        $student->fill(['school' => request('school'),
        'position' => request('position'),
        'country' => request('country'),
        'timezone' => request('timezone'),
        'language' => request('language'),
        'min_commitment' => request('min_commitment'),
        'max_commitment' => request('max_commitment')
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
        return view('students.show', ['student' => $student]);


    }

    public function show()
    {

        $student = Auth::user()->student;
        if ($student == null) {
            return view('students.register');
        } else {
            return view('students.show', ['student' => $student]);
        }

    }
    public function edit()
    {
        $student = Auth::user()->student;
        if ($student == null) {
            return view('students.register');
        } else {
            return view('students.edit', ['student' => $student]);
        }

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
    
}
