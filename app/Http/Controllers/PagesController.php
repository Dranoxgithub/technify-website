<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function show($page) {
        
        return view('pages/' . $page);
    }
    public function NGO_project_new() {
        $timezone_list = app('App\Http\Controllers\ProjectsController')->generate_timezone_list();
        return view('pages/NGO_project_new',['timezone_list' => $timezone_list]); 
    }
    public function checkStudentOrNGO()
    {
        
        if (request()->is('student')) {
            if (Auth::user()->student != null) {
                return view('students.show', ['student' => Auth::user()->student]);
            } else {
                if (Auth::user()->ngo == null) {
                    return view('students.register');
                }
            }
            
        } else {
            if (Auth::user()->ngo != null) {
                return view('ngos.show', ['ngo' => Auth::user()->ngo]);
            } else {
                if (Auth::user()->student == null) {
                    return view('ngos.register');
                }
            }
        }
        return view('pages.portal');

    
        
    }
    
}
