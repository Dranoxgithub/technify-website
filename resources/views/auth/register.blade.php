@extends('layouts.layout')

@section('content')
<div class="container-fluid mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body p-5">
                    <h4 class="card-title font-weight-bold pb-3">Register</h4>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-6 pr-0">
                                <input onclick="handleRadioClick('student')" type="radio" class="btn-check" name="type" value="student" id="type-student" autocomplete="off" checked>
                                <label class="radio btn btn-secondary w-100" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" for="type-student">Student Volunteer</label>
                            </div>

                            <div class="col-6 pl-0">
                                <input onclick="handleRadioClick('ngo')" type="radio" class="btn-check" name="type" value="NGO" id="type-ngo" autocomplete="off">
                                <label class="radio btn btn-secondary w-100" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" for="type-ngo">NGO</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-form-label pt-4" id="name_label">{{ __('Full Name') }}</label>
                            <div>
                                <input placeholder="You cannot change this afterwards. Please use your full name." id="name" type="text" class="form-control @error('name') is-invalid @enderror px-0" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror px-0" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-form-label pt-4">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control px-0" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center pt-4">
                            <div>
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <a class="btn btn-link w-100" href="{{ route('login') }}">
                                {{ __('Already have an account? Log in') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    function handleRadioClick(value) {
        const nameElement = document.getElementById('name_label');
        if (value == 'student') {
            nameElement.innerText = 'Full Name';
        } else {
            nameElement.innerText = 'Contact Person';
        }
    }
</script>
<link href="{{ asset('css/auth_style.css') }}" rel="stylesheet" type="text/css" >
@endsection
