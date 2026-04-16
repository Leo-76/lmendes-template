@extends('template::layouts.app')

@section('title', __('Profile'))
@section('page-title', __('Profile'))

@section('content')

<style>
    .profile-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    @media (max-width: 700px) { .profile-grid { grid-template-columns: 1fr; } }

    .panel {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
    }

    .panel-header {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        font-size: 14px;
        font-weight: 700;
        color: var(--text);
    }

    .panel-body { padding: 20px; }

    .form-group { margin-bottom: 16px; }

    label {
        display: block;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--muted);
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 9px 12px;
        border: 1.5px solid var(--border);
        border-radius: 7px;
        font-size: 14px;
        color: var(--text);
        background: var(--bg);
        outline: none;
        transition: border-color .15s;
    }

    input:focus { border-color: var(--brand); }

    .btn {
        padding: 9px 20px;
        border-radius: 7px;
        font-size: 13.5px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: opacity .15s;
    }

    .btn:hover { opacity: .85; }
    .btn-primary { background: var(--brand); color: #fff; }
    .btn-ghost { background: var(--bg); color: var(--text); border: 1.5px solid var(--border); }

    .error-msg { color: #dc2626; font-size: 12px; margin-top: 4px; }

    .avatar-block {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border);
    }

    .avatar-big {
        width: 64px; height: 64px;
        background: var(--brand);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px; font-weight: 800; color: #fff;
    }

    .avatar-info .name { font-size: 16px; font-weight: 700; }
    .avatar-info .email { font-size: 13px; color: var(--muted); margin-top: 2px; }
</style>

<div class="profile-grid">

    {{-- Info --}}
    <div class="panel">
        <div class="panel-header">{{ __('Profile Information') }}</div>
        <div class="panel-body">

            <div class="avatar-block">
                <div class="avatar-big">{{ initials($user->name) }}</div>
                <div class="avatar-info">
                    <div class="name">{{ $user->name }}</div>
                    <div class="email">{{ $user->email }}</div>
                </div>
            </div>

            <form method="POST" action="{{ route('template.profile.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name') <p class="error-msg">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email') <p class="error-msg">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
            </form>
        </div>
    </div>

    {{-- Password --}}
    <div class="panel">
        <div class="panel-header">{{ __('Update Password') }}</div>
        <div class="panel-body">
            <form method="POST" action="{{ route('template.profile.update') }}">
                @csrf
                @method('PUT')

                {{-- Keep name/email unchanged --}}
                <input type="hidden" name="name"  value="{{ $user->name }}">
                <input type="hidden" name="email" value="{{ $user->email }}">

                <div class="form-group">
                    <label for="current_password">{{ __('Current Password') }}</label>
                    <input type="password" id="current_password" name="current_password" autocomplete="current-password">
                    @error('current_password') <p class="error-msg">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('New Password') }}</label>
                    <input type="password" id="password" name="password" autocomplete="new-password">
                    @error('password') <p class="error-msg">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">{{ __('Confirm New Password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Update password') }}</button>
            </form>
        </div>
    </div>

</div>

@endsection
