@props(['owner', 'nav', 'contact'])

@php
    $isSafeUrl = fn ($url) => is_string($url) && preg_match('#^(https?://|mailto:)#i', $url) === 1;

    $social = [];
    if (!empty($contact['email'])) {
        $social[] = ['label' => 'Email', 'url' => 'mailto:' . $contact['email'], 'icon' => 'fa-solid fa-envelope', 'external' => false];
    }
    if (!empty($contact['facebook'])) {
        $social[] = ['label' => 'Facebook', 'url' => $contact['facebook'], 'icon' => 'fa-brands fa-facebook', 'external' => true];
    }
    if (!empty($contact['github'])) {
        $social[] = ['label' => 'GitHub', 'url' => $contact['github'], 'icon' => 'fa-brands fa-github', 'external' => true];
    }
    foreach ($contact['other'] ?? [] as $other) {
        $social[] = ['label' => $other['label'] ?? 'Link', 'url' => $other['url'] ?? '', 'icon' => $other['icon'] ?? 'fa-solid fa-link', 'external' => true];
    }
    $social = array_values(array_filter($social, fn ($s) => $isSafeUrl($s['url'])));
@endphp

<footer class="site-footer">
    {{-- Little sailing ship on the water (original artwork) --}}
    <div class="site-footer__sea" aria-hidden="true">
        <div class="footer-ship">
            <svg class="footer-ship__svg" viewBox="0 0 120 104" xmlns="http://www.w3.org/2000/svg" focusable="false">
                <rect x="58" y="8" width="4" height="64" rx="1.5" fill="#4A2A11"/>
                <path d="M60 8 L82 13 L60 18 Z" fill="#B52D32"/>
                <path d="M28 18 H92 V54 C76 61 44 61 28 54 Z" fill="#F5F0E6" stroke="#C9B88F" stroke-width="1.5"/>
                <circle cx="60" cy="36" r="9" fill="none" stroke="#B52D32" stroke-width="2.5"/>
                <path d="M60 29 L62.5 34 L67.5 36 L62.5 38 L60 43 L57.5 38 L52.5 36 L57.5 34 Z" fill="#B52D32"/>
                <path d="M8 70 H112 C108 87 96 95 80 97 H36 C24 95 12 87 8 70 Z" fill="#6B4020" stroke="#2D1809" stroke-width="1.5"/>
                <path d="M8 70 H112" stroke="#D6A84B" stroke-width="3.5"/>
                <circle cx="116" cy="68" r="5" fill="#E3B558" stroke="#8E6A22" stroke-width="1"/>
            </svg>
        </div>
        <svg class="site-footer__wave" viewBox="0 0 1200 40" preserveAspectRatio="none" focusable="false">
            <path d="M0 20 C100 4 200 36 300 20 S500 4 600 20 S800 36 900 20 S1100 4 1200 20 V40 H0 Z" fill="#172C40"/>
        </svg>
    </div>

    <div class="container site-footer__inner">
        <div class="site-footer__brand">
            <a href="#home" class="site-footer__logo" aria-label="{{ $owner['full_name'] }} - back to top">
                <i class="fa-solid fa-skull-crossbones" aria-hidden="true"></i>
                <span>{{ $owner['initials'] }}</span>
            </a>
            <p class="site-footer__name">{{ $owner['full_name'] }}</p>
            <p class="site-footer__tagline">End of the adventure... for now. Every ending is the start of the next voyage.</p>
        </div>

        <nav class="site-footer__nav" aria-label="Footer navigation">
            <ul>
                @foreach ($nav as $item)
                    <li><a href="#{{ $item['id'] }}">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        @if (count($social))
            <ul class="site-footer__social" aria-label="Social links">
                @foreach ($social as $link)
                    <li>
                        <a href="{{ $link['url'] }}" aria-label="{{ $link['label'] }}" title="{{ $link['label'] }}"
                           @if ($link['external']) target="_blank" rel="noopener noreferrer" @endif>
                            <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        <p class="site-footer__copy">&copy; {{ date('Y') }} {{ $owner['full_name'] }}. All Rights Reserved.</p>
    </div>
</footer>
