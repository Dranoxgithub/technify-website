<?php

namespace App\Http\Controllers;

use App\Ngo;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;

class NgosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store() 
    {   
        
        $ngo = new Ngo();
        $ngo->user_id = Auth::user()->id;
        $ngo->name = request('name');
        $ngo->website = request('website');
        $ngo->cause = request('cause');
        $ngo->save();
        
        return redirect()->back();
    } 
    public function update()
    {
        $ngo = Ngo::where('user_id', Auth::user()->id) -> first();
        $ngo->user_id = Auth::user()->id;
        $ngo->name = request('name');
        $ngo->website = request('website');
        $ngo->cause = request('cause');
        $ngo->save();
        
        Session::flash('message', 'Successfully updated.');

        return view('ngos.show', ['ngo' => $ngo]);
    }
    public function edit()
    {
        $ngo = Auth::user()->ngo;
        if ($ngo == null) {
            return view('ngos.register');
        } else {
            return view('ngos.edit', ['ngo' => $ngo]);
        }

    }
}
