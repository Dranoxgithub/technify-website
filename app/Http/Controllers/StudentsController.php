<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function store()
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
        $student->save();
        return view('students.show', ['student' => $student]);
        
    }

    public function update()
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
    
}
