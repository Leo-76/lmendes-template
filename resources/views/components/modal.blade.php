@props(['id', 'title' => null, 'size' => 'md'])

@php
$widths = ['sm' => '400px', 'md' => '560px', 'lg' => '720px', 'xl' => '900px'];
$w = $widths[$size] ?? $widths['md'];
@endphp

<div id="{{ $id }}"
     style="display:none;position:fixed;inset:0;z-index:999;background:rgba(0,0,0,.4);align-items:center;justify-content:center"
     onclick="if(event.target===this)this.style.display='none'">

    <div style="background:var(--surface);border-radius:var(--radius);box-shadow:0 20px 60px rgba(0,0,0,.2);width:100%;max-width:{{ $w }};margin:16px">

        @if($title)
        <div style="padding:16px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between">
            <span style="font-size:15px;font-weight:700;color:var(--text)">{{ $title }}</span>
            <button onclick="document.getElementById('{{ $id }}').style.display='none'"
                    style="background:none;border:none;cursor:pointer;color:var(--muted);font-size:20px;line-height:1">&times;</button>
        </div>
        @endif

        <div style="padding:20px">{{ $slot }}</div>
    </div>
</div>

<script>
function openModal(id) { document.getElementById(id).style.display = 'flex'; }
function closeModal(id) { document.getElementById(id).style.display = 'none'; }
</script>
