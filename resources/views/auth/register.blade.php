@extends('template::layouts.guest')

@section('title', __('Register'))
@section('subtitle', __('Create your account'))

@section('content')
<form method="POST" action="{{ route('template.register') }}">
    @csrf

    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" id="name" name="name"
               value="{{ old('name') }}" required autofocus>
        @error('name')
            <p class="error-msg">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <input type="email" id="email" name="email"
               value="{{ old('email') }}" required>
        @error('email')
            <p class="error-msg">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input type="password" id="password" name="password" required autocomplete="new-password">
        @error('password')
            <p class="error-msg">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn-primary">{{ __('Create account') }}</button>
</form>

<div class="auth-footer">
    {{ __('Already have an account?') }}
    <a href="{{ route('template.login') }}">{{ __('Sign in') }}</a>
</div>
@endsection
