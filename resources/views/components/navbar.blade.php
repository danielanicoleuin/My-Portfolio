@props(['owner', 'nav'])

<header class="site-nav" id="site-nav">
    <div class="container site-nav__inner">
        <div class="site-nav__brand">
            <a href="#home" class="site-nav__logo" aria-label="{{ $owner['full_name'] }} - back to top">
                <i class="fa-solid fa-skull-crossbones" aria-hidden="true"></i>
                <span>{{ $owner['initials'] }}</span>
            </a>
            <x-log-pose :nav="$nav" />
        </div>

        <button type="button" class="nav-toggle" id="nav-toggle"
                aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="nav-menu">
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
        </button>

        <nav class="site-nav__menu" id="nav-menu" aria-label="Main navigation">
            <ul class="site-nav__links">
                @foreach ($nav as $item)
                    <li>
                        <a href="#{{ $item['id'] }}" data-nav-link="{{ $item['id'] }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
