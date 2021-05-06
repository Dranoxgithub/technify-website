<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Response;
use Session;
use DateTimeZone;
use DateTime;
use Mail;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user:admin');
    }
    public function test(Request $request)
    {
        return redirect('/');
    }
}
