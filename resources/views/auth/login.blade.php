@extends('layouts.app')

@section('content')

<div id="login-page">

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <div class="container">
        <div class="Form login-form">
        <h2>{{ __('Login') }}</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-box">
                <i class='bx bxs-user'></i>
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email*">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="input-box">
                <i class='bx bxs-envelope'></i>
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password*">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="forgot-section">
                <span><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</span>
                @if (Route::has('password.request'))
                    <span><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></span>
                @endif
            </div>

            <button type="submit" class="btn">{{ __('Login') }}</button>
        </form>
        
        <p class="RegisteBtn RegiBtn"><a href="{{ route('register') }}">{{ __('Register Now') }}</a></p>
        </div>
    </div>
</div>


@endsection
