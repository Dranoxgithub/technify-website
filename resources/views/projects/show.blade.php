@extends('layouts.index')
@section('content')
@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('message') }}
    </div>
@endif

<div class="button-wrapper">
    <!-- @if(URL::previous() == 'http://127.0.0.1:8000/project_listing')
        <a class="button" href="{{ URL::previous() }}">Return to Projects</a>
    @else
        <a class="button" href="{{ URL::previous() }}">Return to Dashboard</a>
    @endif -->
    <a class="button" href="/about_us">Return to Projects</a>
    
</div>
<div class="wrapper">
    
    <?php $ngo = $project->Ngo ?>
    <h2 class="align-center">{{ $project->name }}</h2>
    
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('NGO Full Name') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $ngo->name }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('NGO Website') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $ngo->website }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Causes') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $ngo->cause }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $project->name }}</label>
            
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Goal') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $project->goal }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Weekly Commitment') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $project->commitment }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Start Date') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ date('d M, Y', strtotime($project->start_date)) }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project End Datel') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ date('d M, Y', strtotime($project->end_date)) }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $project->country }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $project->timezone }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $project->description }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Skills Preferred') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $project->skill }}</label>
            
        </div>
    </div>
    @guest
        <div class="button-wrapper">
            <a class="button" href="/join_us">Apply</a>
        </div>
    
    @else
        @if(Auth::user()->student != null)
            
            <form  method="POST" action="/projects/{{$project->id}}">
                @csrf
                <div class="button-wrapper">
                    <button type="submit" class="button" >
                        Apply
                    </button>
                </div>
                
                
            </form>
       
        @endif
        
        

    @endguest
    

    


    

</div>	
@endsection