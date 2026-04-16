@props(['type' => 'info', 'title' => null, 'dismissible' => false])

@php
$colors = [
    'info'    => ['bg' => '#eff6ff', 'border' => '#bfdbfe', 'text' => '#1e40af'],
    'success' => ['bg' => '#f0fdf4', 'border' => '#bbf7d0', 'text' => '#166534'],
    'warning' => ['bg' => '#fffbeb', 'border' => '#fde68a', 'text' => '#92400e'],
    'danger'  => ['bg' => '#fef2f2', 'border' => '#fecaca', 'text' => '#991b1b'],
];
$c = $colors[$type] ?? $colors['info'];
@endphp

<div {{ $attributes }}
     style="background:{{ $c['bg'] }};border:1px solid {{ $c['border'] }};border-radius:8px;padding:12px 16px;color:{{ $c['text'] }};font-size:13.5px;display:flex;align-items:flex-start;gap:10px"
     @if($dismissible) x-data="{ show: true }" x-show="show" @endif>

    <div style="flex:1">
        @if($title)
        <div style="font-weight:700;margin-bottom:2px">{{ $title }}</div>
        @endif
        {{ $slot }}
    </div>

    @if($dismissible)
    <button @click="show=false" style="background:none;border:none;cursor:pointer;color:inherit;opacity:.6;font-size:16px;line-height:1;padding:0">&times;</button>
    @endif
</div>
