@extends('template::layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .stat-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--muted);
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: var(--text);
        line-height: 1;
    }

    .stat-sub {
        font-size: 12px;
        color: var(--muted);
    }

    .stat-icon {
        width: 36px; height: 36px;
        background: var(--brand-light);
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 4px;
    }

    .stat-icon svg { width: 18px; height: 18px; color: var(--brand); stroke: var(--brand); }

    .welcome-banner {
        background: linear-gradient(135deg, var(--brand) 0%, color-mix(in srgb, var(--brand) 70%, #818cf8) 100%);
        border-radius: var(--radius);
        padding: 28px 32px;
        color: #fff;
        margin-bottom: 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .welcome-banner h2 { font-size: 20px; font-weight: 700; margin-bottom: 4px; }
    .welcome-banner p  { font-size: 13.5px; opacity: .85; }

    .welcome-avatar {
        width: 56px; height: 56px;
        background: rgba(255,255,255,.2);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px; font-weight: 800; color: #fff;
        flex-shrink: 0;
    }

    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 14px;
    }

    .activity-list {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 20px;
        border-bottom: 1px solid var(--border);
        font-size: 13.5px;
    }

    .activity-item:last-child { border-bottom: none; }

    .activity-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: var(--brand);
        flex-shrink: 0;
    }

    .activity-text { flex: 1; color: var(--text); }
    .activity-time { color: var(--muted); font-size: 12px; white-space: nowrap; }
</style>

{{-- Welcome banner --}}
<div class="welcome-banner">
    <div>
        <h2>{{ __('Welcome back') }}, {{ auth()->user()->name ?? 'User' }}</h2>
        <p>{{ __("Here's what's happening with your project today.") }}</p>
    </div>
    <div class="welcome-avatar">{{ initials(auth()->user()->name ?? 'U') }}</div>
</div>

{{-- Stats --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>
            </svg>
        </div>
        <div class="stat-label">{{ __('Total Users') }}</div>
        <div class="stat-value">—</div>
        <div class="stat-sub">{{ __('Registered accounts') }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>
            </svg>
        </div>
        <div class="stat-label">{{ __('Environment') }}</div>
        <div class="stat-value" style="font-size:18px">{{ app()->environment() }}</div>
        <div class="stat-sub">Laravel {{ app()->version() }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
            </svg>
        </div>
        <div class="stat-label">{{ __('Server Time') }}</div>
        <div class="stat-value" style="font-size:18px">{{ now()->format('H:i') }}</div>
        <div class="stat-sub">{{ now()->format('D, d M Y') }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
            </svg>
        </div>
        <div class="stat-label">{{ __('Package') }}</div>
        <div class="stat-value" style="font-size:16px">lmendes/template</div>
        <div class="stat-sub">{{ __('Active & ready') }}</div>
    </div>
</div>

{{-- Activity --}}
<div class="section-title">{{ __('Recent Activity') }}</div>
<div class="activity-list">
    <div class="activity-item">
        <div class="activity-dot"></div>
        <div class="activity-text">{{ __('Package installed successfully') }}</div>
        <div class="activity-time">{{ __('just now') }}</div>
    </div>
    <div class="activity-item">
        <div class="activity-dot" style="background:#10b981"></div>
        <div class="activity-text">{{ __('Dashboard is up and running') }}</div>
        <div class="activity-time">{{ now()->format('H:i') }}</div>
    </div>
    <div class="activity-item">
        <div class="activity-dot" style="background:#f59e0b"></div>
        <div class="activity-text">{{ __('Customize config/template.php to get started') }}</div>
        <div class="activity-time">—</div>
    </div>
</div>

@endsection
