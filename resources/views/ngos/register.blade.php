@extends ('layouts.layout')
@section ('content')
   

@if (Auth::check())
<div class="wrapper container my-4">
    <h2 class="text-center">Complete NGO Profile</h2>
			<form method="POST" action="/NGO" enctype="multipart/form-data">

			@csrf
			<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">{{ __('Contact Person') }}</label>

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
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NGO Full Name') }}</label>

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
				<label for="website" class="col-md-4 col-form-label text-md-right">{{ __('NGO Website') }}</label>

				<div class="col-md-6">
					<input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('webste') }}" autocomplete="website" autofocus>

					@error('website')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
		

			<div class="form-group row">
				<label for="cause" class="col-md-4 col-form-label text-md-right">{{ __('Causes') }}</label>

				<div class="col-md-6">
					
					<select id="cause" name="cause">
  						<option value="Animal Welfare">Animal Welfare</option>
						<option value="Arts">Arts</option>
						<option value="Children & Youth">Children & Youth</option>
						<option value="Community">Community</option>
						<option value="Education">Education</option>
						<option value="Eldercare">Eldercare</option>
						<option value="Environment & Water">Environment & Water</option>
						<option value="Families">Families</option>
						<option value="Health">Health</option>
						<option value="Heritage">Heritage</option>
						<option value="Humanitarian">Humanitarian</option>
						<option value="Social Services">Social Services</option>
						<option value="Special Needs/ Disabilities">Special Needs/ Disabilities</option>
						<option value="Sports">Sports</option>
						<option value="Women & Girls">Women & Girls</option>
					</select>
					@error('cause')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			
			<div class="form-group row">
				<label for="proof" class="col-md-4 col-form-label text-md-right">{{ __('Proof of NGO Status') }}</label>

				<div class="col-md-6">
					<input id="proof" type="file" class="@error('proof') is-invalid @enderror" name="proof" value="{{ old('proof') }}" accept=".pdf" autocomplete="proof" autofocus>
				</div>
				@error('proof')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Register as an NGO') }}
					</button>
				</div>
			</div>
			</form>
		</div>	


@else


<section id="banner">
    <div class="content d-flex flex-column justify-content-center">
        <h2>Please log in as a general user before signing up as a student/ NGO.</h2>
        
        <ul class="actions">
            <li><a href="{{ route('login') }}" class="button special">Log in</a></li>
            <li><a href="{{ route('register') }}" class="button special">Register</a></li>
        </ul>
    </div>
</section>

	
@endif

@endsection