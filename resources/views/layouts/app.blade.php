<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ template_theme() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', template_config('name')) — {{ template_config('name') }}</title>

    <style>
        :root {
            --brand: {{ template_config('color', '#6366f1') }};
            --brand-light: color-mix(in srgb, var(--brand) 15%, white);
            --sidebar-w: 260px;
            --radius: 10px;
            --shadow: 0 1px 3px rgba(0,0,0,.08), 0 4px 16px rgba(0,0,0,.05);

            /* Light theme */
            --bg: #f5f5f7;
            --surface: #ffffff;
            --border: #e5e7eb;
            --text: #111827;
            --muted: #6b7280;
            --sidebar-bg: #1e1e2e;
            --sidebar-text: #cdd6f4;
            --sidebar-active: var(--brand);
        }

        [data-theme="dark"] {
            --bg: #0f0f17;
            --surface: #1a1a2e;
            --border: #2d2d44;
            --text: #e2e8f0;
            --muted: #94a3b8;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ── Sidebar ── */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 100;
        }

        .sidebar-logo {
            padding: 24px 20px;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            letter-spacing: -.3px;
            border-bottom: 1px solid rgba(255,255,255,.06);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-logo span {
            width: 32px; height: 32px;
            background: var(--brand);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; font-weight: 800; color: #fff;
            flex-shrink: 0;
        }

        .sidebar-nav { flex: 1; padding: 16px 12px; overflow-y: auto; }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 7px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: background .15s, color .15s;
            margin-bottom: 2px;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background: rgba(255,255,255,.08);
            color: #fff;
        }

        .sidebar-nav a.active { background: var(--brand); color: #fff; }

        .sidebar-nav a svg { width: 16px; height: 16px; flex-shrink: 0; opacity: .8; }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,.06);
        }

        .user-block {
            display: flex; align-items: center; gap: 10px;
            padding: 8px 10px; border-radius: 7px;
            color: var(--sidebar-text);
        }

        .user-avatar {
            width: 32px; height: 32px;
            background: var(--brand);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 700; color: #fff;
            flex-shrink: 0;
        }

        .user-name { font-size: 13px; font-weight: 600; color: #fff; line-height: 1.2; }
        .user-email { font-size: 11px; color: var(--sidebar-text); }

        /* ── Main ── */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0 28px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky; top: 0;
            z-index: 50;
        }

        .topbar h1 { font-size: 16px; font-weight: 600; }

        .topbar-actions { display: flex; align-items: center; gap: 12px; }

        .topbar-actions a {
            font-size: 13px;
            color: var(--muted);
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            transition: background .15s;
        }

        .topbar-actions a:hover { background: var(--bg); color: var(--text); }

        .page-content { padding: 28px; flex: 1; }

        /* ── Flash ── */
        .flash {
            padding: 12px 16px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-size: 13.5px;
            font-weight: 500;
        }
        .flash-success { background: #d1fae5; color: #065f46; }
        .flash-error   { background: #fee2e2; color: #7f1d1d; }
    </style>

    @stack('styles')
</head>
<body>

{{-- Sidebar --}}
<aside class="sidebar">
    <div class="sidebar-logo">
        <span>{{ mb_substr(template_config('name', 'A'), 0, 1) }}</span>
        {{ template_config('name') }}
    </div>

    <nav class="sidebar-nav">
        @foreach(template_menu() as $item)
            <a href="{{ route($item['route']) }}"
               class="{{ request()->routeIs($item['route']) ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    @if($item['icon'] === 'home')
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    @elseif($item['icon'] === 'user')
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    @else
                        <circle cx="12" cy="12" r="10"/>
                    @endif
                </svg>
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    <div class="sidebar-footer">
        <div class="user-block">
            <div class="user-avatar">{{ initials(auth()->user()->name ?? 'U') }}</div>
            <div>
                <div class="user-name">{{ auth()->user()->name ?? 'User' }}</div>
                <div class="user-email">{{ auth()->user()->email ?? '' }}</div>
            </div>
        </div>
    </div>
</aside>

{{-- Main --}}
<div class="main">
    <header class="topbar">
        <h1>@yield('page-title', 'Dashboard')</h1>
        <div class="topbar-actions">
            <a href="{{ route('template.profile') }}">Profile</a>
            <form method="POST" action="{{ route('template.logout') }}" style="display:inline">
                @csrf
                <button type="submit" style="background:none;border:none;cursor:pointer;font-size:13px;color:var(--muted);padding:6px 12px;border-radius:6px;">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <div class="page-content">
        @if(session('success'))
            <div class="flash flash-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</div>

@stack('scripts')
</body>
</html>
