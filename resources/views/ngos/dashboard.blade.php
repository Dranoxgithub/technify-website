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
				<div class="card-body p-4 display-flex justify-content-between">
					<div class="card-title pb-3" style="margin-top:-.3125rem">
							<h4 class="navbar-brand font-weight-bold mr-5" style="width:auto;">Projects</h4>
							<form class="form-inline justify-content-between">
								<input class="form-control mr-sm-2 search" type="search" placeholder="Search..." aria-label="Search">
								<a href="#" class="btn btn-primary">
										{{ __('Add Project') }}
								</a>
							</form>
						<!-- <h4>
							<span class="font-weight-bold">Login</span>
							<form class="form-inline">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							</form>
						</h4> -->

					</div>

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