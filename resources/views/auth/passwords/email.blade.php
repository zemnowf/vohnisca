@extends('layouts.app')

@section('title', 'Vohnisca | Forgot password')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">{{ __('Reset Password') }}</div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>

                    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="form-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="auth-btn">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
</div>
@endsection
