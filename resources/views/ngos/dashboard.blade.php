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
							<label class="col-4 col-form-label">{{ __('Contact Name') }}</label>
							<label class="col-8 col-form-label">{{ Auth::user()->name }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('Contact Email') }}</label>
							<label class="col-8 col-form-label">{{ Auth::user()->email }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('NGO Name') }}</label>
							<label class="col-8 col-form-label">{{ $ngo->name }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('NGO Website') }}</label>
							<label class="col-8 col-form-label">{{ $ngo->website }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('Causes') }}</label>
							<label class="col-8 col-form-label">{{ $ngo->cause }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('Password') }}</label>
							<a href="{{ route('password.request') }}" class="col-8 col-form-label link">Change Password</a>
						</div>

						<div class="form-group row mb-0 justify-content-center pt-4">
							<div>
								<a href="{{ route('logout') }}" class="btn btn-primary w-100">
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
				<div class="card-body p-4">
					<div class="card-title pb-3 d-flex justify-content-between flex-md-nowrap flex-wrap" style="margin-top:-.3125rem">
						<span class="d-md-inline d-flex justify-content-between mb-3 w-100 w-md-auto">
							<h4 class="navbar-brand font-weight-bold mr-5 w-auto pb-0 my-0">Projects</h4>
							<input class="form-control mr-sm-2 search w-auto" type="search" placeholder="Search..." aria-label="Search">
						</span>
						<a href="#" class="btn btn-primary mb-3 w-100 w-md-auto">
							{{ __('Add Project') }}
						</a>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')
<link href="{{ asset('css/ngo_dashboard_style.css') }}" rel="stylesheet" type="text/css">
@endsection