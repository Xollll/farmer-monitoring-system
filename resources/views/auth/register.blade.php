@extends('layouts.app')

@section('content')

<div id="register-page">

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <div class="container">
        <div class="Form register-form">
            <h2>{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Your Name*">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email*">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-box">
                    <i class='bx bxs-lock'></i>
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Your Password*">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-box">
                    <i class='bx bxs-lock'></i>
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password*">
                </div>

                <button type="submit" class="btn">{{ __('Register') }}</button>
            </form>

            <p class="LoginBtn"><a href="{{ route('login') }}">{{ __('Already have an account? Login') }}</a></p>
        </div>
    </div>
</div>

@endsection
