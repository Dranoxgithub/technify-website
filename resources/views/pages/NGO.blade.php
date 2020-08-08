@extends ('layouts.index')

@section ('content')

@if (Auth::check())
	
	<?php $ngo = Auth::user()->ngo; ?>
	@if ($ngo == null)
		<div class="wrapper">
			<form method="POST" action="/NGO">

			@csrf
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
					<input id="cause" type="text" class="form-control @error('cause') is-invalid @enderror" name="cause" value="{{ old('cause') }}" required autocomplete="causes" autofocus>

					@error('cause')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="button">
						{{ __('Register as an NGO') }}
					</button>
				</div>
			</div>
			</form>
		</div>	
	@else
	
	<div class="wrapper">
			<form method="POST" action="/NGO/update">
			@csrf
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
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NGO Full Name') }}</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $ngo->name }}" required autocomplete="name" autofocus>

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
					<input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ $ngo->website }}" autocomplete="website" autofocus>

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
					<input id="cause" type="text" class="form-control @error('cause') is-invalid @enderror" name="cause" value="{{ $ngo->cause }}" required autocomplete="causes" autofocus>

					@error('cause')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="button">
						{{ __('Confirm NGO info') }}
					</button>
				</div>
			</div>
			</form>
		</div>	
	@endif
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