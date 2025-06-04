@extends('layouts.app')

@section('title', 'Vohnisca | Sign in')

@section('content')
    <div class="auth-container">
        <div class="auth-card">

            <div class="auth-header">
                <h2>Sign in</h2>
                <p>And start managing your campaigns</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Email Address or Username') }}</label>
                    <input id="email" type="email" class="form-input
                    @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="Enter your username or email">

                    @error('email')
                    <span class="form-error" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>


                    <input id="password" type="password"
                           class="form-input
                           @error('password') is-invalid @enderror" name="password"
                           required autocomplete="current-password" autofocus
                           placeholder="Enter your password">

                    @error('password')
                    <span class="form-error" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-options">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif

                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">{{ __('Remember Me') }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="auth-btn">
                        {{ __('Sign In') }}
                    </button>
                </div>

                <div class="auth-footer">
                    Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                </div>
            </form>

        </div>
    </div>
@endsection
