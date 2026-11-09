{{-- Animated ocean: layered waves with a distant ship and the Sunny-inspired ship sailing between them. --}}
<div class="ocean" aria-hidden="true">
    <div class="wave wave--back">
        <svg viewBox="0 0 2880 200" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
            <defs>
                <linearGradient id="wave-fill-back" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#4C86B8"/>
                    <stop offset="1" stop-color="#1F4E7A"/>
                </linearGradient>
            </defs>
            <path d="M0 70 c 90 -26 270 -26 360 0 s 270 26 360 0 c 90 -26 270 -26 360 0 s 270 26 360 0 c 90 -26 270 -26 360 0 s 270 26 360 0 c 90 -26 270 -26 360 0 s 270 26 360 0 V200 H0 Z" fill="url(#wave-fill-back)"/>
        </svg>
    </div>
    <x-sailing-ship variant="far" />
    <div class="wave wave--mid">
        <svg viewBox="0 0 2880 200" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
            <defs>
                <linearGradient id="wave-fill-mid" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#2A6393"/>
                    <stop offset="1" stop-color="#14385A"/>
                </linearGradient>
            </defs>
            <path d="M0 80 c 90 -38 270 -38 360 0 s 270 38 360 0 c 90 -38 270 -38 360 0 s 270 38 360 0 c 90 -38 270 -38 360 0 s 270 38 360 0 c 90 -38 270 -38 360 0 s 270 38 360 0 V200 H0 Z" fill="url(#wave-fill-mid)"/>
        </svg>
    </div>
    <x-sailing-ship variant="main" />
    <div class="wave wave--front">
        <svg viewBox="0 0 2880 200" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
            <defs>
                <linearGradient id="wave-fill-front" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#173A5C"/>
                    <stop offset="1" stop-color="#0B1626"/>
                </linearGradient>
            </defs>
            <path d="M0 92 c 90 -50 270 -50 360 0 s 270 50 360 0 c 90 -50 270 -50 360 0 s 270 50 360 0 c 90 -50 270 -50 360 0 s 270 50 360 0 c 90 -50 270 -50 360 0 s 270 50 360 0 V200 H0 Z" fill="url(#wave-fill-front)"/>
        </svg>
    </div>
</div>
