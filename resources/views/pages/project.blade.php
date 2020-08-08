@extends('layouts.index')
@section('content')
<div class="button-wrapper">
    <a class="button" href="/NGO_project_index">Return to Dashboard</a>
</div>
<div class="wrapper">
    
    <?php $ngo = $project->Ngo ?>
    <h2>{{ $project->name }}</h2>
    
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('NGO Full Name') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $ngo->name }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('NGO Website') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $ngo->website }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Causes') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $ngo->cause }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->name }}</label>
            
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Goal') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->goal }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Weekly Commitment') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->commitment }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Start Datel') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->start_date }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project End Datel') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->end_date }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->country }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->timezone }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->description }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Skills Preferred') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->skill }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Contact Person') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->contact_name }}</label>
            
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Project Contact Email') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $project->contact_email }}</label>
            
        </div>
    </div>


    

    


    

</div>	
@endsection