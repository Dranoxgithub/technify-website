@extends ('layouts.layout')
@section ('content')



        

      
           

	

<div class="wrapper container my-4">
    <h2 class="text-center">Choose Your Preferred Projects</h2>
    <h3 class="text-center">View our available projects <a href="/project_listing">here</a>!</h3>
    <h4 class="text-center">Please rank your preferred projects in order blow:</h4>

        <form method="POST" action="{{ route('projects.temp_apply') }}" enctype="multipart/form-data">
        
        @csrf
        
        @foreach(range(1, min(count($projects), 3)) as $i)
        <div class="form-group row">
				<label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Project Interested ('.$i.')') }}</label>

				<div class="col-md-6">
					
					<select id="position" class="form-control @error('position') is-invalid @enderror" name="project-choice-{{ $i }}" value="" autofocus {{ $i == 1?'required':'' }}>
                        @foreach($projects as $project)
                        <option value="{{ $project->name }}">{{ $project->name }}</option>
                        @endforeach
                        <option value="other">Other</option>
					</select>
					@error('position')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
        @endforeach

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Any Comments?') }}</label>
        <div class="col-md-6">
            <textarea name="comments" class="form-control"></textarea>
        </div>
    </div>

        
        <div class="form-group row justify-content-center justify-content-md-around">
            
            <a href="/student" class="col-md-4 col-10 mb-2 btn btn-light">
                {{ __('Back') }}
            </a>
            <button type="submit" class="col-md-4 col-10 mb-2 btn btn-primary d-flex justify-content-center align-items-center">
                {{ __('Submit your profile for application') }}
            </button>
        </div>

        </form>
    </div>	
    


@endsection