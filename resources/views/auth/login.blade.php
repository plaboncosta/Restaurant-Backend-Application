@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <!-- <a href="{{url('login/google')}}" style="text-decoration: none; display: block; text-align: center; margin: 0px auto 5px; background-color: #EA4335; color: #fff; border: 1px solid #ddd; padding:10px 0px; width:210px; border-radius: 6px;">Continue with Google</a>
                    <a href="{{url('login/facebook')}}" style="text-decoration: none; display: block; text-align: center; margin: 10px auto 15px; background-color: #4267b2; color: #fff; border: 1px solid #ddd; padding:10px 0px; width:210px;     border-radius: 6px;">Continue with Facebook</a> -->
                    <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <a style="text-decoration: none;" href="{{url('login/google')}}">
                                <button style="background-color: #EA4335; color: #fff; outline: none;" type="button" class="btn btn-lg btn-block">Continue with Google</button></a>
                            </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <a style="text-decoration: none;" href="{{url('login/facebook')}}">
                            <button style="background-color: #4267b2; color: #fff; outline: none;" type="button" class="btn btn-lg btn-block">Continue with Facebook</button></a>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
