@props(['color' => 'indigo', 'dot' => false])

@php
$palette = [
    'indigo' => 'background:#eef2ff;color:#4338ca',
    'green'  => 'background:#f0fdf4;color:#166534',
    'red'    => 'background:#fef2f2;color:#991b1b',
    'yellow' => 'background:#fffbeb;color:#92400e',
    'gray'   => 'background:#f3f4f6;color:#374151',
];
$style = ($palette[$color] ?? $palette['indigo']).';display:inline-flex;align-items:center;gap:5px;padding:2px 9px;border-radius:999px;font-size:12px;font-weight:600';
@endphp

<span {{ $attributes->merge(['style' => $style]) }}>
    @if($dot)
    <span style="width:6px;height:6px;border-radius:50%;background:currentColor"></span>
    @endif
    {{ $slot }}
</span>
