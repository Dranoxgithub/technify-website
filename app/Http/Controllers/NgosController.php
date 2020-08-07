<?php

namespace App\Http\Controllers;

use App\Ngo;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class NgosController extends Controller
{
    public function store() 
    {   
        dd(Auth::user()->id);
        $ngo = new Ngo();
        $ngo->contact_name = Auth::user()->name;
        $ngo->contact_email = Auth::user()->email;
        $ngo->name = request('name');
        $ngo->website = request('website');
        $ngo->cause = request('cause');
        $ngo->save();

        return redirect()->back();
    } 
}
