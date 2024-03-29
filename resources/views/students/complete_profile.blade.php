@extends ('layouts.layout')
@section ('content')



@if (Auth::check())
		<div class="wrapper container my-4">
			<h2 class="text-center">Complete Your Profile</h2>
			<form method="POST" action="/student" enctype="multipart/form-data">

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
					<input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school') }}" autocomplete="school" required autofocus>

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
					
					<select id="position" class="form-control @error('timezone') is-invalid @enderror" value="{{ old('position') }}" name="position" autofocus required>
						<option selected="selected" value="" hidden>Choose one</option>
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
				<label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

				<div class="col-md-6">
					
					<select id="country" class="form-control @error('timezone') is-invalid @enderror" value="{{ old('country') }}" name="country" autofocus required>
						<option selected="selected" value="" hidden>Choose one</option>
  						<option value="Brunei">Brunei</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Laos">Laos</option>
						<option value="Malaysia">Malaysia</option>
						<option value="Myanmar">Myanmar</option>
						<option value="Phillipines">Phillipines</option>
						<option value="Singapore">Singapore</option>
						<option value="Thailand">Thailand</option>
						<option value="Vietnam">Vietnam</option>
						<option value="United States">United States</option>
					</select>
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
					<select id="timezone" type="text" class="form-control @error('timezone') is-invalid @enderror" name="timezone" value="{{ old('timezone') }}" required autocomplete="timezone" autofocus>
						<option selected="selected" value="" hidden>Choose one</option>
						<?php
						
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
				<label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Spoken Languages') }}</label>

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
				<label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

				<div class="col-md-6">
					<input id="resume" type="file" class="@error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') }}" accept=".pdf" required autocomplete="resume" autofocus>
				</div>
				@error('resume')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

		<div class="form-group row justify-content-center justify-content-md-around">
			<button type="submit" class="col-md-4 col-10 mb-2 btn btn-primary">
				{{ __('Review Your Info') }}
			</button>
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