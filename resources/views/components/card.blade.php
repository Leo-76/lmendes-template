{{-- resources/views/components/card.blade.php --}}
@props(['title' => null, 'subtitle' => null, 'padded' => true])

<div {{ $attributes->merge(['class' => 'template-card']) }}
     style="background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow)">

    @if($title)
    <div style="padding:14px 20px;border-bottom:1px solid var(--border)">
        <div style="font-size:14px;font-weight:700;color:var(--text)">{{ $title }}</div>
        @if($subtitle)
        <div style="font-size:12px;color:var(--muted);margin-top:2px">{{ $subtitle }}</div>
        @endif
    </div>
    @endif

    <div @if($padded) style="padding:20px" @endif>
        {{ $slot }}
    </div>
</div>
