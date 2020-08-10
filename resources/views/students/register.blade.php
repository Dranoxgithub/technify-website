@extends ('layouts.index')
@section ('content')



        

      
           

@if (Auth::check())
		<div class="wrapper">
			<form method="POST" action="/student">

			@csrf
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
				<label for="school" class="col-md-4 col-form-label text-md-right">{{ __('University') }}</label>

				<div class="col-md-6">
					<input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school') }}" required autocomplete="school" autofocus>

					@error('school')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Role interested') }}</label>

				<div class="col-md-6">
					
					<select id="position" name="position">
  						<option value="Software Engineering">Software Engineering</option>
						<option value="UI/UX Designer">UI/UX Designer</option>
						<option value="Product Manager">Product Manager</option>
					</select>
					@error('position')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Role interested') }}</label>

				<div class="col-md-6">
					<input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" autocomplete="position" autofocus>

					@error('position')
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

					@error('country')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
            </div>
            
            <div class="form-group row">
				<label for="timezone" class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

				<div class="col-md-6">
					<input id="timezone" type="text" class="form-control @error('country') is-invalid @enderror" name="timezone" value="{{ old('timezone') }}" required autocomplete="timezone" autofocus>

					@error('timezone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
            </div>
            
            <div class="form-group row">
				<label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Language') }}</label>

				<div class="col-md-6">
					<input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}" required autocomplete="language" autofocus>

					@error('language')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
            </div>

            <div class="form-group row">
				<label for="commitment" class="col-md-4 col-form-label text-md-right">{{ __('Commitment') }}</label>

				<div class="col-md-6 row" id="commitment-range">
                    <input placeholder="h/week" id="min_commitment" type="number" class="form-control @error('min_commitment') is-invalid @enderror 6u 12u$(xsmall)" name="min_commitment" value="{{ old('min_commitment') }}" required autocomplete="min_commitment" autofocus>-
                    <input placeholder="h/week" id="max_commitment" type="number" class="form-control @error('max_commitment') is-invalid @enderror 6u$ 12u$(xsmall)" name="max_commitment" value="{{ old('max_commitment') }}" required autocomplete="max_commitment" autofocus>

					@error('min_commitment')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                    @enderror
                    @error('max_commitment')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
            </div>
            

			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="button">
						{{ __('Register as a student') }}
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