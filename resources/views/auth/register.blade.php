@extends('layouts.layout')

@section('content')
<div class="container-fluid mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Register</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-6 pr-0">
                                <input type="radio" class="btn-check" name="type" value="student" id="type-student" autocomplete="off" checked>
                                <label class="radio btn btn-secondary w-100" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" for="type-student">Student Volunteer</label>
                            </div>

                            <div class="col-6 pl-0">
                                <input type="radio" class="btn-check" name="type" value="ngo" id="type-ngo" autocomplete="off">
                                <label class="radio btn btn-secondary w-100" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" for="type-ngo">NGO</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
                            <!-- You cannot change this afterwards. Please use your full name. -->
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-link w-100">Already have an account? Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<style>
    .btn-check + .radio {
        border-radius: .5rem; 
        background-color: white;
        border-color: #e8e8e8;
        color: #26484a;
    }
    .btn-check:hover + .radio,
    .btn-check:checked + .radio {
        background-color: #429993;
        border-color: #377d79;
        color: white;
        box-shadow: none;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select.form-control {
        background: transparent;
        border: none;
        border-bottom: 2px solid #e5e5e5;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 0;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    select.form-control:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #3f938d;
    }

    .btn.btn-primary {
        background-color: #3f938d;
        border-color: transparent;
    }

    .btn.btn-primary:active {
        background-color: #26484a !important;
    }

    .btn.btn-link {
        color: #429993;
    }

    .btn.btn-link:visited {
        color: #377d79;
    }

    .btn:focus,
    .btn:active {
        box-shadow: none !important;
    }
</style>
@endsection
