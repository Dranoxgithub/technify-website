@extends ('layouts.index')
@section ('content')



        

      
           




	
<div class="wrapper">
        
        
        
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
        <label class="col-md-4 col-form-label text-md-right">{{ __('Language') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $student->language }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Commitment') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $student->min_commitment . ' - ' . $student->max_commitment . ' hours/ week'}}</label>
            
        </div>
    </div>
    
    

    
    
    <div class="align-center sm-hidden">
        <embed
        src="{{ action('StudentsController@getResume') }}"
        style="width:600px; height:500px;"
        frameborder="0"
        alt="resume in pdf">
    </div>
    
    
    
    
    

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <a href="/student/edit" class="button">
                {{ __('Edit info') }}
            </a>
            <a href="/project_listing" class="button">
                {{ __('Apply projects') }}
            </a>
        </div>
    </div>

</div>	


@endsection