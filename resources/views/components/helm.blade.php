@php
    $photo = config('portfolio.owner.profile_image');
    if (!$photo || !file_exists(public_path($photo))) { $photo = null; }
@endphp
{{-- Wooden pirate ship steering wheel (original artwork). The .helm__wheel group rotates; the photo hub stays upright. --}}
<div class="helm" id="helm" aria-hidden="true">
    <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" role="img" focusable="false">
        <defs>
            <linearGradient id="helm-wood" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#B27C40"/>
                <stop offset=".5" stop-color="#7B4B21"/>
                <stop offset="1" stop-color="#4A2A11"/>
            </linearGradient>
            <linearGradient id="helm-wood-light" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0" stop-color="#8A5827"/>
                <stop offset=".45" stop-color="#C58C4E"/>
                <stop offset="1" stop-color="#6A3F1B"/>
            </linearGradient>
            <radialGradient id="helm-brass" cx=".38" cy=".35" r=".75">
                <stop offset="0" stop-color="#F5D98B"/>
                <stop offset=".55" stop-color="#D6A84B"/>
                <stop offset="1" stop-color="#8E6A22"/>
            </radialGradient>
            <clipPath id="helm-photo-clip"><circle cx="200" cy="200" r="60"/></clipPath>
            <radialGradient id="helm-glow" cx=".5" cy=".5" r=".5">
                <stop offset="0" stop-color="#D6A84B" stop-opacity=".28"/>
                <stop offset="1" stop-color="#D6A84B" stop-opacity="0"/>
            </radialGradient>
        </defs>

        <circle cx="200" cy="200" r="198" fill="url(#helm-glow)"/>

        <g class="helm__wheel">
            {{-- 8 spokes with turned handles --}}
            @for ($i = 0; $i < 8; $i++)
                <g transform="rotate({{ $i * 45 }} 200 200)">
                    <rect x="193" y="30" width="14" height="170" rx="5" fill="url(#helm-wood-light)" stroke="#2D1809" stroke-width="1.5"/>
                    <rect x="188" y="6" width="24" height="46" rx="12" fill="url(#helm-wood)" stroke="#2D1809" stroke-width="1.5"/>
                    <rect x="186" y="44" width="28" height="7" rx="3" fill="url(#helm-brass)" stroke="#6B4C16" stroke-width="1"/>
                    <path d="M196 14 V40" stroke="#E0B173" stroke-opacity=".45" stroke-width="2" stroke-linecap="round"/>
                </g>
            @endfor

            {{-- Rim --}}
            <circle cx="200" cy="200" r="128" fill="none" stroke="#2D1809" stroke-width="30"/>
            <circle cx="200" cy="200" r="128" fill="none" stroke="url(#helm-wood)" stroke-width="26"/>
            <circle cx="200" cy="200" r="133" fill="none" stroke="#E0B173" stroke-opacity=".4" stroke-width="2"/>
            <circle cx="200" cy="200" r="118" fill="none" stroke="#2D1809" stroke-opacity=".6" stroke-width="2"/>

            {{-- Brass studs where the spokes meet the rim --}}
            @for ($i = 0; $i < 8; $i++)
                <g transform="rotate({{ $i * 45 }} 200 200)">
                    <circle cx="200" cy="72" r="6" fill="url(#helm-brass)" stroke="#6B4C16" stroke-width="1"/>
                </g>
            @endfor
        </g>

        {{-- Photo hub: stays upright while the wheel turns around it --}}
        <g class="helm__hub">
            <circle cx="200" cy="200" r="72" fill="url(#helm-brass)" stroke="#6B4C16" stroke-width="3"/>
            <circle cx="200" cy="200" r="64" fill="#3A2410" stroke="#6B4C16" stroke-opacity=".8" stroke-width="2"/>
            @if ($photo)
                <image href="{{ asset($photo) }}" x="140" y="140" width="120" height="120"
                       preserveAspectRatio="xMidYMid slice" clip-path="url(#helm-photo-clip)"/>
            @endif
            <circle cx="200" cy="200" r="60" fill="none" stroke="#F5D98B" stroke-opacity=".55" stroke-width="2"/>
        </g>
    </svg>
</div>
