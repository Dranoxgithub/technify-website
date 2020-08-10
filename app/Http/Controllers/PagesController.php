<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function show($page) {
        
        return view('pages/' . $page);
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
                return view('pages.ngo');
            } else {
                if (Auth::user()->student == null) {
                    return view('pages.ngo');
                }
            }
        }
        return view('pages.portal');

    
        
    }
}
