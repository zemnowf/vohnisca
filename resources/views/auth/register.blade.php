@extends('layouts.app')

@section('title', 'Vohnisca | Sign up')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Create Your Account</h2>
                <p>Join Vohnisca to start managing your campaigns</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Username') }}</label>
                    <input id="name" type="text" class="form-input @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                           placeholder="Enter your username">

                    @error('name')
                    <span class="form-error" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email"
                           placeholder="Enter your email">

                    @error('email')
                    <span class="form-error" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password"
                           placeholder="Create a password">

                    @error('password')
                    <span class="form-error" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-input"
                           name="password_confirmation" required autocomplete="new-password"
                           placeholder="Confirm your password">
                </div>

                <div class="form-group">
                    <button type="submit" class="auth-btn">
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="auth-footer">
                    Already have an account? <a href="{{ route('login') }}">Sign in</a>
                </div>
            </form>
        </div>
    </div>
@endsection
