@extends ('layouts.layout')
@section ('content')



        

      
           

	

<div class="wrapper container my-4">
    <h2 class="text-center">Edit Your Profile</h2>

        <form method="POST" action="/student" enctype="multipart/form-data">
        
        @csrf
        @method('PATCH')
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
                <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ $student->school }}" autocomplete="school" autofocus>

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
					
					<select id="position" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $student->position }}" autofocus required>
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
					
					<select id="country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $student->country }}" autofocus required>
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
					<select id="timezone" type="text" class="form-control @error('timezone') is-invalid @enderror" name="timezone" value="{{ $student->timezone }}" required autocomplete="timezone" autofocus>
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
                <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ $student->language }}" required autocomplete="language" autofocus>

                @error('language')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- <div class="form-group row">
        <label for="commitment" class="col-md-4 col-form-label text-md-right">{{ __('Commitment') }}</label>
            <div class="col-md-6 row" id="commitment-range">
                <input placeholder="h/week" id="min_commitment" type="number" class="form-control @error('min_commitment') is-invalid @enderror 6u 12u$(xsmall)" name="min_commitment" value="{{ $student->min_commitment }}" required autocomplete="min_commitment" autofocus>-
                <input placeholder="h/week" id="max_commitment" type="number" class="form-control @error('max_commitment') is-invalid @enderror 6u$ 12u$(xsmall)" name="max_commitment" value="{{ $student->max_commitment }}" required autocomplete="max_commitment" autofocus>

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
        </div> -->
        

        
        <div class="form-group row mb-0 sm-hidden">
            <div class="col-md-6 offset-md-4">
            <embed
            src="{{ action('StudentsController@getResume') }}"
            style="width:100%; height:500px;"
            frameborder="0"
            alt="resume in pdf">
            </div>
        </div>
        
        <div class="form-group row mb-0 sm-hidden">
            <div class="col-md-6 offset-md-4">
            Your previously saved resume displayed here.
            </div>
        </div>

        <div class="form-group row">
				<label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

				<div class="col-md-6">
                    <input id="resume" type="file" class="@error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') }}" accept=".pdf" autocomplete="resume" autofocus>
                    {{ $student->resume_name }}
                </div>
                @error('resume')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        
        <div class="form-group row justify-content-center justify-content-md-around">
            <button type="submit" class="col-md-4 col-10 mb-2 btn btn-edit d-flex justify-content-center align-items-center">
                <div>
                    {{ __('Update Info') }}
                </div>
            </button>
            <a href="/student" class="col-md-4 col-10 mb-2 btn btn-primary">
                {{ __('Cancel') }}
            </a>
        </div>

        </form>
    </div>	
    


@endsection