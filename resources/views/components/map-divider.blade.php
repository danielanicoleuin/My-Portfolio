@props(['icon' => 'fa-solid fa-compass', 'accent' => 'gold'])

{{-- Decorative treasure-map route between sections: a dotted path draws itself toward a marker. --}}
<div class="map-divider map-divider--{{ $accent }}" data-reveal aria-hidden="true">
    <svg class="map-divider__route" viewBox="0 0 400 40" preserveAspectRatio="none" focusable="false">
        <path d="M0 22 C40 4 80 40 130 22 S220 6 270 24 S360 34 400 20"/>
    </svg>
    <span class="map-divider__mark"><i class="{{ $icon }}"></i></span>
    <svg class="map-divider__route map-divider__route--end" viewBox="0 0 400 40" preserveAspectRatio="none" focusable="false">
        <path d="M0 22 C40 4 80 40 130 22 S220 6 270 24 S360 34 400 20"/>
    </svg>
</div>
