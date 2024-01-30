@extends('layouts.app1')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div class="col-md-7" style="min-height: 100vh; background-color: #FBB245; display: flex; align-items: center;">
                <img src="{{ asset('img/logo/linya_logo.png') }}" class="img-fluid mx-auto">
            </div>
            <div class="col-md-5" style="min-height: 100vh; background-color: #013440;">
                <div class="row w-75 mx-auto" style="margin-top: 10%;">
                    <div class="col-md-12 text-center">
                        <h3 class="login-header">Login Form</h3>
                        <h3 class="login-subheader">Please enter your details</h3>
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
                <div class="row w-75 mx-auto mt-3">
                    <div class="col-md-12 w-100">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row w-75 mx-auto mt-3" style="margin-bottom: 10%;">
                    <div class="col-md-12 text-center">
                      <p class="sign-up">Create an account? <a href="{{ url('/register') }}" class="sign-up-link">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
