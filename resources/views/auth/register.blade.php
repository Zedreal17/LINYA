@extends('layouts.app1')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
            <div class="col-md-7" style="min-height: 100vh; background-color: #FBB245; display: flex; align-items: center;">
                <img src="{{ asset('img/logo/linya_logo.png') }}" class="img-fluid mx-auto">
            </div>
            <div class="col-md-5" style="min-height: 100vh; background-color: #013440;">
                <div class="row w-75 mx-auto" style="margin-top: 10%;">
                    <div class="col-md-12 text-center">
                        <h3 class="login-header">Sign up now</h3>
                        <h3 class="login-subheader">Please enter your details</h3>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="first_name">{{ __('First Name') }}</label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">{{ __('Last Name') }}</label>
                        <input id="last-name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="user_id">ID Number</label>
                        <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="phone-number">Phone Number</label>
                        <input id="phone-number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div class="col-md-12">
                        
                        <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto mt-3" style="margin-bottom: 10%;">
                    <div class="col-md-12 text-center">
                      <p class="sign-up">Already have an account? <a href="{{ url('/login') }}" class="sign-up-link">Log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

