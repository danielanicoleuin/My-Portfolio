{{-- Soft sunset glow and drifting clouds (decorative). --}}
<div class="sky" aria-hidden="true">
    <div class="sky__sun"></div>
    @foreach ([1, 2, 3, 4] as $n)
        <svg class="cloud cloud--{{ $n }}" viewBox="0 0 200 80" xmlns="http://www.w3.org/2000/svg" focusable="false">
            <g fill="#F5F0E6">
                <ellipse cx="70" cy="50" rx="60" ry="24"/>
                <circle cx="100" cy="32" r="28"/>
                <circle cx="142" cy="44" r="22"/>
                <ellipse cx="120" cy="56" rx="60" ry="20"/>
            </g>
        </svg>
    @endforeach
</div>
