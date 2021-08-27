@extends ('layouts.layout')
@section ('content')

           
<div class="wrapper">
		<form method="POST" action="/NGO">
			@csrf
            @method('PATCH')
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
					<input id="cause" type="text" class="form-control @error('cause') is-invalid @enderror" name="cause" value="{{ $ngo->cause }}" required autocomplete="cause" autofocus>

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
                        {{ __('Update info') }}
                    </button>
                    <a  href="/NGO" class="button">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
			</form>
		</div>	

@endsection