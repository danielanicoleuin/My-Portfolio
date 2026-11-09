{{-- Original pirate flag (skull and crossbones) on a small pole. The cloth gently waves. --}}
<div class="pirate-flag" aria-hidden="true">
    <svg viewBox="0 0 170 230" xmlns="http://www.w3.org/2000/svg" focusable="false">
        <defs>
            <linearGradient id="flag-wood" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0" stop-color="#8A5827"/>
                <stop offset=".5" stop-color="#C58C4E"/>
                <stop offset="1" stop-color="#6A3F1B"/>
            </linearGradient>
        </defs>

        <rect x="12" y="16" width="7" height="212" rx="3" fill="url(#flag-wood)" stroke="#2D1809" stroke-width="1"/>
        <circle cx="15.5" cy="13" r="8" fill="#D6A84B" stroke="#8E6A22" stroke-width="1.5"/>

        <g class="pirate-flag__cloth">
            <path d="M19 28 H158 L140 66 L158 104 H19 Z" fill="#0B0F18" stroke="#D6A84B" stroke-width="3" stroke-linejoin="round"/>

            {{-- crossbones --}}
            <g stroke="#F5F0E6" stroke-width="6" stroke-linecap="round">
                <path d="M58 88 L110 44"/>
                <path d="M110 88 L58 44"/>
            </g>
            <g fill="#F5F0E6">
                <circle cx="56" cy="90" r="5"/><circle cx="112" cy="90" r="5"/>
                <circle cx="56" cy="42" r="5"/><circle cx="112" cy="42" r="5"/>
            </g>

            {{-- skull --}}
            <circle cx="84" cy="58" r="17" fill="#F5F0E6"/>
            <rect x="75" y="68" width="18" height="12" rx="3" fill="#F5F0E6"/>
            <circle cx="78" cy="57" r="4.3" fill="#0B0F18"/>
            <circle cx="90" cy="57" r="4.3" fill="#0B0F18"/>
            <path d="M84 62 L81.5 68 H86.5 Z" fill="#0B0F18"/>
            <path d="M79 74 V80 M84 74 V80 M89 74 V80" stroke="#0B0F18" stroke-width="1.5"/>
        </g>
    </svg>
</div>
