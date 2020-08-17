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
                <h3>Sem turpis amet semper</h3>
                <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat commodo eu sed ante lacinia. Sapien a lorem in integer ornare praesent commodo adipiscing arcu in massa commodo lorem accumsan at odio massa ac ac. Semper adipiscing varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
                
                
                
            </div>
            
            <div class="6u$ 12u$(small)">
                <h3>Magna odio tempus commodo</h3>
                <p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor. Ante commodo blandit adipiscing integer semper orci eget. Faucibus commodo adipiscing mi eu nullam accumsan morbi arcu ornare odio mi adipiscing nascetur lacus ac interdum morbi accumsan vis mi accumsan ac praesent.</p>

                
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