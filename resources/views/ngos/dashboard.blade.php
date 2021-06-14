@extends('layouts.layout')

@section('content')
<div class="container-lg my-3">
	<div class="row justify-content-center">
		<!-- NGO info display -->
		<div class="col-md-4 my-3">
			<div class="card">
				<div class="card-body p-4">
					<h4 class="card-title font-weight-bold">{{ $ngo->name }}</h4>
					<h6 class="card-subtitle pb-3 text-muted">NGO</h6>
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label class="col-6 col-form-label">{{ __('Contact Person') }}</label>
							<label class="col-6 col-form-label">{{ Auth::user()->name }}</label>
						</div>

						<div class="form-group row">
							<label class="col-6 col-form-label">{{ __('Contact Email') }}</label>
							<label class="col-6 col-form-label">{{ Auth::user()->email }}</label>
						</div>						

						<div class="form-group row">
							<label class="col-6 col-form-label">{{ __('NGO Name') }}</label>
							<label class="col-6 col-form-label">{{ $ngo->name }}</label>
						</div>
						
						<div class="form-group row">
							<label class="col-6 col-form-label">{{ __('NGO Website') }}</label>
							<label class="col-6 col-form-label">{{ $ngo->website }}</label>
						</div>
						
						<div class="form-group row">
							<label class="col-6 col-form-label">{{ __('Causes') }}</label>
							<label class="col-6 col-form-label">{{ $ngo->cause }}</label>
						</div>

                        <div class="form-group row mb-0 justify-content-center pt-4">
                            <div>
                                <a href="/logout" class="btn btn-primary w-100">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>

		<!-- Project display -->
		<div class="col-md-8 my-3">
			<div class="card">
				<div class="card-body p-5">
					<h4 class="card-title font-weight-bold pb-3">Login</h4>
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label for="email" class="col-form-label pt-4">{{ __('E-Mail Address') }}</label>

							<div>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror px-0" name="email" value="{{ old('email') }}" required autocomplete="email">

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-form-label pt-4">{{ __('Password') }}</label>

							<div>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror px-0" name="password" required autocomplete="current-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
									</label>
								</div>
							</div>
						</div>


						<div class="form-group row mb-0 justify-content-center pt-4">
							<div>
								<button type="submit" class="btn btn-primary w-100">
									{{ __('Login') }}
								</button>
							</div>
							@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
							@endif
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')
<!-- <link href="{{ asset('css/auth_style.css') }}" rel="stylesheet" type="text/css"> -->
<link href="{{ asset('css/ngo_dashboard_style.css') }}" rel="stylesheet" type="text/css">
@endsection