@extends('layouts.layout')
@section('content')


<div class="container my-2">
    @if(Auth::user() && Auth::user()->type == 'NGO')
        <a class="btn btn-primary" href="/NGO">Return to Dashboard</a>
    @else 
        <a class="btn btn-primary" href="{{ URL::previous() }}">Return</a>
    @endif
</div>

<div class="wrapper container my-4">
    <?php $ngo = $project->ngo ?>
    <h2 class="text-center">{{ $project->name }}</h2>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('NGO Full Name') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $ngo->name }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('NGO Website') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $ngo->website }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Causes') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $ngo->cause }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $project->name }}</label>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Goal') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $project->goal }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Weekly Commitment') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $project->commitment }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Start Date') }}</label>

        <div class="col-md-6">
            <label class="ccol-form-label form-max-width">{{ date('d M, Y', strtotime($project->start_date)) }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project End Date') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ date('d M, Y', strtotime($project->end_date)) }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $project->country }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $project->timezone }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <label class="col-form-label form-max-width">{{ $project->description }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Skills Preferred') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label form-max-width">{{ $project->skill }}</label>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center flex-wrap">
        <span class="btns-talent">
            @if ($project->swe_needed)
            <button class="btn btn-sm project-button btn-swe">Software Engineer</button>
            @endif
            @if ($project->pm_needed)
            <button class="btn btn-sm project-button btn-pm">Project Manager</button>
            @endif
            @if ($project->d_needed)
            <button class="btn btn-sm project-button btn-d">Designer</button>
            @endif
        </span>
    </div>

    @guest
    <div class="form-group row justify-content-center my-2">
        <a class="col-md-4 col-10 btn btn-primary" href="/register">Apply</a>
    </div>

    @else
        @if(Auth::user()->student != null)
            
            <form class="row justify-content-center my-2" method="POST" action="/projects/{{$project->id}}">
                @csrf
                    <button type="submit" class="col-md-4 col-10 btn btn-primary" >
                        Apply
                    </button>
            </form>
        @endif
    @endguest
    </div>
</div>
@endsection