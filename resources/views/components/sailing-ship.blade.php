@props(['variant' => 'main'])

{{-- Original pirate ship illustration (Thousand Sunny-inspired: golden sun-lion figurehead at the bow, two masts). --}}
<div class="ship ship--{{ $variant }}" aria-hidden="true">
    <div class="ship__body">
        <svg viewBox="0 0 270 220" xmlns="http://www.w3.org/2000/svg" focusable="false">
            {{-- rigging --}}
            <g stroke="#E8D8B5" stroke-opacity=".5" stroke-width="1">
                <path d="M143 18 L22 150"/>
                <path d="M143 18 L206 44"/>
                <path d="M206 42 L248 146"/>
            </g>

            {{-- masts --}}
            <rect x="140" y="18" width="6" height="134" rx="2" fill="#4A2A11"/>
            <rect x="203" y="42" width="6" height="110" rx="2" fill="#4A2A11"/>

            {{-- sails --}}
            <path d="M98 34 H190 V104 C160 114 128 114 98 104 Z" fill="#F5F0E6" stroke="#C9B88F" stroke-width="2"/>
            <path d="M180 56 H240 V100 C218 108 198 108 180 100 Z" fill="#F5F0E6" stroke="#C9B88F" stroke-width="2"/>
            <circle cx="144" cy="68" r="17" fill="none" stroke="#B52D32" stroke-width="4"/>
            <path d="M144 55 L148 65 L158 68 L148 71 L144 81 L140 71 L130 68 L140 65 Z" fill="#B52D32"/>
            <path d="M98 100 C128 110 160 110 190 100" fill="none" stroke="#B52D32" stroke-width="5"/>

            {{-- pennants --}}
            <path d="M143 18 L172 25 L143 32 Z" fill="#B52D32"/>
            <path d="M206 42 L228 47 L206 52 Z" fill="#D6A84B"/>

            {{-- stern cabin --}}
            <rect x="26" y="124" width="62" height="28" rx="3" fill="#5B3716" stroke="#2D1809" stroke-width="1.5"/>
            <circle cx="42" cy="138" r="4.5" fill="#F2C46A"/>
            <circle cx="62" cy="138" r="4.5" fill="#F2C46A"/>
            <circle cx="78" cy="138" r="4.5" fill="#F2C46A"/>

            {{-- bowsprit --}}
            <path d="M232 150 L252 142" stroke="#4A2A11" stroke-width="6" stroke-linecap="round"/>

            {{-- hull --}}
            <path d="M16 150 H236 C230 178 206 194 172 198 H66 C40 194 22 178 16 150 Z" fill="#6B4020" stroke="#2D1809" stroke-width="2"/>
            <path d="M16 150 H236" stroke="#D6A84B" stroke-width="5"/>
            <path d="M26 168 H226" stroke="#D6A84B" stroke-opacity=".6" stroke-width="2.5"/>
            <circle cx="70" cy="178" r="2.5" fill="#D6A84B"/>
            <circle cx="110" cy="182" r="2.5" fill="#D6A84B"/>
            <circle cx="150" cy="182" r="2.5" fill="#D6A84B"/>

            {{-- golden sun-lion figurehead --}}
            <g transform="translate(250 144)">
                <g fill="#D6A84B">
                    @for ($i = 0; $i < 10; $i++)
                        <path transform="rotate({{ $i * 36 }})" d="M-5 -13 L0 -22 L5 -13 Z"/>
                    @endfor
                </g>
                <circle r="14" fill="#E3B558" stroke="#8E6A22" stroke-width="1.5"/>
                <circle r="8" fill="#F5D98B"/>
                <circle cx="-3" cy="-2" r="1.5" fill="#3A2410"/>
                <circle cx="3" cy="-2" r="1.5" fill="#3A2410"/>
                <path d="M-3 3 Q0 6 3 3" stroke="#3A2410" stroke-width="1.2" fill="none" stroke-linecap="round"/>
            </g>
        </svg>
    </div>
</div>
