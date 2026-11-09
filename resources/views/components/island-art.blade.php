@props(['n' => 1])

{{-- Original island illustration; colours come from the .island--N palette in CSS. --}}
<svg class="island-art" viewBox="0 0 400 250" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
    <defs>
        <linearGradient id="island-sky-{{ $n }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0" style="stop-color: var(--sky-a)"/>
            <stop offset="1" style="stop-color: var(--sky-b)"/>
        </linearGradient>
        <linearGradient id="island-sea-{{ $n }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0" style="stop-color: var(--sea-a)"/>
            <stop offset="1" style="stop-color: var(--sea-b)"/>
        </linearGradient>
    </defs>

    <rect width="400" height="250" fill="url(#island-sky-{{ $n }})"/>
    <circle cx="305" cy="92" r="34" fill="#F5D98B" fill-opacity=".85"/>
    <ellipse class="island-art__cloud" cx="90" cy="60" rx="38" ry="11" fill="#F5F0E6" fill-opacity=".45"/>
    <ellipse class="island-art__cloud island-art__cloud--2" cx="250" cy="36" rx="28" ry="8" fill="#F5F0E6" fill-opacity=".35"/>

    <path d="M255 190 Q295 140 350 190 Z" fill="#101D35" fill-opacity=".35"/>
    <path d="M62 196 Q108 122 170 120 Q232 118 278 196 Z" style="fill: var(--land)"/>
    <ellipse cx="170" cy="196" rx="122" ry="12" fill="#E8D8B5"/>

    <path d="M160 124 Q170 90 190 72" fill="none" stroke="#5B3716" stroke-width="5" stroke-linecap="round"/>
    <g fill="none" stroke="#2D6A3E" stroke-width="6" stroke-linecap="round">
        <path d="M190 72 Q160 56 134 74"/>
        <path d="M190 72 Q170 42 148 40"/>
        <path d="M190 72 Q216 52 242 70"/>
        <path d="M190 72 Q196 42 220 36"/>
    </g>

    <rect y="192" width="400" height="58" fill="url(#island-sea-{{ $n }})"/>
    <path d="M0 196 q25 -8 50 0 t50 0 t50 0 t50 0 t50 0 t50 0 t50 0 t50 0" fill="none" stroke="#F5F0E6" stroke-opacity=".28" stroke-width="2"/>
    <path d="M0 220 q25 -8 50 0 t50 0 t50 0 t50 0 t50 0 t50 0 t50 0 t50 0" fill="none" stroke="#F5F0E6" stroke-opacity=".15" stroke-width="2"/>
</svg>
