@extends('layouts.index')
@section('content')
    

    <section id="main" class="wrapper">
    <h2 class="align-center red-theme">
        @if (Auth::user()->student != null) 
            You have registered as a student. 
        @endif
        @if (Auth::user()->ngo != null) 
            You have registered as an NGO. 
        @endif
    </h1>
    <div class="inner">
        <div class="row">
            <div class="6u 12u$(small)">
                <h3>Welcome On Board!</h3>
                @if (Auth::user()->student != null)
                    <p>Apply for projects and start changing the world now!</p>
                @endif
                
                @if (Auth::user()->ngo != null)
                    <p></p>
                @endif
            </div>         
        </div>
        
    </div>
    <div class="button-wrapper">
        @if (Auth::user()->student != null) 
            <a href="/student" class="button">Manage your profile</a>
        @endif
        @if (Auth::user()->ngo != null) 
        <ul class="actions">
            <li><a href="/NGO" class="button">Manage profile</a></li>
            <li><a href="/NGO_project_index" class="button">Project Dashboard</a></li>						
		</ul>
        
        @endif
        
    </div>

    </section>
    
@endsection