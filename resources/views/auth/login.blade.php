@extends('template::layouts.guest')

@section('title', __('Login'))
@section('subtitle', __('Sign in to your account'))

@section('content')
<form method="POST" action="{{ route('template.login') }}">
    @csrf

    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <input type="email" id="email" name="email"
               value="{{ old('email') }}" required autofocus autocomplete="email">
        @error('email')
            <p class="error-msg">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input type="password" id="password" name="password"
               required autocomplete="current-password">
        @error('password')
            <p class="error-msg">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="checkbox-row">
            <input type="checkbox" name="remember">
            {{ __('Remember me') }}
        </label>
    </div>

    <button type="submit" class="btn-primary">{{ __('Sign in') }}</button>
</form>

@if(config('template.auth.register_enabled'))
<div class="auth-footer">
    {{ __("Don't have an account?") }}
    <a href="{{ route('template.register') }}">{{ __('Sign up') }}</a>
</div>
@endif
@endsection
