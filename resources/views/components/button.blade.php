@props(['variant' => 'primary', 'size' => 'md', 'type' => 'button', 'loading' => false, 'href' => null])

@php
$sizes = ['sm' => 'padding:6px 12px;font-size:12px', 'md' => 'padding:9px 18px;font-size:13.5px', 'lg' => 'padding:12px 24px;font-size:15px'];
$variants = [
    'primary'   => 'background:var(--brand);color:#fff;border:none',
    'secondary' => 'background:var(--bg);color:var(--text);border:1.5px solid var(--border)',
    'danger'    => 'background:#dc2626;color:#fff;border:none',
    'ghost'     => 'background:transparent;color:var(--brand);border:1.5px solid var(--brand)',
];
$style = ($sizes[$size] ?? $sizes['md']).';'.($variants[$variant] ?? $variants['primary']).';border-radius:7px;font-weight:600;cursor:pointer;transition:opacity .15s;text-decoration:none;display:inline-flex;align-items:center;gap:6px';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['style' => $style]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['style' => $style]) }} @if($loading) disabled @endif>
        @if($loading)
        <svg style="width:14px;height:14px;animation:spin 1s linear infinite" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4"/>
        </svg>
        @endif
        {{ $slot }}
    </button>
    <style>@keyframes spin { to { transform: rotate(360deg); } }</style>
@endif
