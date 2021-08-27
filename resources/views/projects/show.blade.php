@extends('layouts.layout')
@section('content')


<div class="container my-2">
    @if(Auth::user() && Auth::user()->type == 'NGO' && $project->ngo->id == Auth::user()->ngo->id)
        <div class="d-flex justify-content-between flex-md-nowrap flex-wrap">
            <a class="mb-2 btn btn-primary" href="/NGO">Return to Dashboard</a>
            <div class="justify-content-center justify-content-md-around">
                <a href="#" onclick="document.querySelector('#toggle_completion-form').submit();" class="btn btn-primary">
                    Mark as {{ $project->status == 'recruiting' ? 'Completed' : 'Recruiting' }}
                </a>
                <form id="toggle_completion-form" method="POST" style="display: none;">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="toggle_completion" value="true">
                </form>
                <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary">
                    Edit
                </a>
                <a href="#" onclick="if(confirm('Are you sure you want to delete this project?')) document.querySelector('#project-delete-form').submit();" class="btn btn-primary">
                    Delete
                </a>
                <form id="project-delete-form" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
    @else 
        <a class="btn btn-primary" href="{{ URL::previous() }}">Return</a>
    @endif
</div>

<div class="wrapper container my-4">
    <?php $ngo = $project->ngo ?>
    <h2 class="text-center">{{ $project->name }}</h2>
    <div class="d-flex justify-content-center align-items-center flex-wrap">
        <button class="btn btn-primary btn-sm project-button">{{ $project->status == 'recruiting' ? 'Recruiting' : 'Completed' }}</button>
    </div>
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