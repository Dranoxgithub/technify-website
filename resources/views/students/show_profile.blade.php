@extends ('layouts.layout')
@section ('content')


    
           




	
<div class="wrapper container my-4">

    <h2 class="text-center">Your Profile</h2>

        
        
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ Auth::user()->name }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ Auth::user()->email }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('University') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $student->school }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Role interested') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $student->position }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $student->country }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $student->timezone }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Spoken Languages') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $student->language }}</label>
            
        </div>
    </div>
    

    
    <div class="form-group row">
		<label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

		<div class="col-md-6">
            <embed
            src="{{ action('StudentsController@getResume') }}"
            style="width:600px; height:500px;"
            frameborder="0"
            alt="resume in pdf">
		</div>
				
    </div>

    
    
    
    


    <div class="form-group row justify-content-center justify-content-md-around">
        <!-- <div class="col-md-3"> -->
            <a href="/student/edit" class="col-md-4 col-10 mb-2 btn btn-edit d-flex justify-content-center align-items-center">
                <div>
                    {{ __('Edit info') }}
                </div>
            </a>
            <a href="{{ route('projects.temp_apply') }}" class="col-md-4 col-10 mb-2 btn btn-primary">
                {{ __('Submit your profile for application') }}
            <!-- <a href="/student/select_project" class="col-md-4 col-10 mb-2 btn btn-primary">
                {{ __('Select your preferred projects') }} -->
            </a>
        <!-- </div> -->
    </div>
    

</div>	


@endsection