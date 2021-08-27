@extends('layouts.layout')

@section('content')
<div class="wrapper container my-4">
    <h2 class="text-center">New Project</h2>
    <form method="POST">
    @csrf
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
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="goal" class="col-md-4 col-form-label text-md-right">{{ __('Project Goal') }}</label>

        <div class="col-md-6">
            <input id="goal" type="text" class="form-control @error('goal') is-invalid @enderror" name="goal" value="{{ old('goal') }}" required autocomplete="goal" autofocus>

            @error('goal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Project Start Date') }}</label>

        <div class="col-md-6">
            <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date">

            @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Project End Date') }}</label>

        <div class="col-md-6">
            <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date">

            @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div class="col-md-6">
            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
				<datalist id="country">
					<option value="Brunei">
					<option value="Cambodia">
                    <option value="Indonesia">
                    <option value="Laos">
                    <option value="Malaysia">
                    <option value="Myanmar">
                    <option value="Phillipines">
                    <option value="Singapore">
                    <option value="Thailand">
                    <option value="Vietnam">
                    <option value="United States">												
                </datalist>
            @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- <div class="form-group row">
        <label for="timezone" class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

        <div class="col-md-6">
            <input id="timezone" type="text" class="form-control @error('skill') is-invalid @enderror" name="timezone" value="{{ old('timezone') }}" required autocomplete="timezone" autofocus>

            @error('timezone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div> -->

    <div class="form-group row">
        <label for="timezone" class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

        <div class="col-md-6">
        <select name="timezone">
            <option selected="selected">Choose one</option>
            <?php
            // A sample product array
            
            
            // Iterating through the product array
            foreach($timezone_list as $item){
                echo "<option value='$item'>$item</option>";
            }
            ?>
        </select>

            @error('timezone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>



    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Project Description') }}</label>

        <div class="col-md-6">
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Skills Preferred') }}</label>

        <div class="col-md-6">
            <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" required autocomplete="skill" autofocus>

            @error('skill')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Roles needed') }}</label>
        <div class="col-md-6">
            <input for="swe" type="checkbox" name="role_group[]" id="swe" value="swe">
            <label>Software Engineer</label>
            <input for="pm" type="checkbox" name="role_group[]" id="pm" value="pm" >
            <label>Product Manager</label>
            <input for="d" type="checkbox" name="role_group[]" id="d" value="d" >  
            <label>Designer</label>
        </div>
    </div>

    <div class="form-group row">
        <label for="contact_name" class="col-md-4 col-form-label text-md-right">{{ __('Project Contact Person') }}</label>

        <div class="col-md-6">
            <input id="contact_name" type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name" value="{{ Auth::user()->name }}" required autocomplete="contact_name" autofocus>

            @error('contact_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

   
    <div class="form-group row">
        <label for="contact_email" class="col-md-4 col-form-label text-md-right">{{ __('Project Contact Email') }}</label>

        <div class="col-md-6">
            <input id="contact_email" type="text" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ Auth::user()->email }}" autocomplete="contact_email" autofocus>

            @error('contact_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


   

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Create') }}
            </button>
        </div>
    </div>
    </form>
</div>	
@endsection