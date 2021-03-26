@extends ('layouts.layout')
@section ('content')


@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('message') }}
    </div>
        
@endif
      
	
<div class="wrapper">
    
    <div class="form-group row">    
        <label class="col-md-4 col-form-label text-md-right">{{ __('Contact Person Name') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ Auth::user()->name }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Contact Person Email') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ Auth::user()->email }}</label>
            
        </div>
    </div>
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
        

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <a href="/NGO/edit" class="button">
                {{ __('Edit info') }}
            </a>
            <a href="/NGO_project_index" class="button">
                {{ __('Project Dashboard') }}
            </a>
            
        </div>
    </div>

</div>	


@endsection