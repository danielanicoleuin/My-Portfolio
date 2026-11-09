<section id="home" class="section section--home" aria-labelledby="home-title">
    <x-sky />
    <x-ocean />

    <div class="container home__grid">
        <div class="home__text" data-reveal>
            <p class="home__welcome">{{ $home['welcome'] }}</p>
            <h1 id="home-title" class="home__name">{{ $owner['full_name'] }}</h1>

            <p class="home__title" aria-live="polite">
                <span class="home__title-prefix">I'm a </span>
                <span class="home__typed" id="typed-title"
                      data-titles='@json($home['titles'])'>{{ $home['titles'][0] ?? '' }}</span>
            </p>

            <p class="home__intro">{{ $home['intro'] }}</p>

            <div class="home__actions">
                <a href="#about" class="btn btn--gold"><i class="fa-solid fa-compass" aria-hidden="true"></i> Discover My Story</a>
                <a href="#contact" class="btn btn--ghost"><i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Contact Me</a>
            </div>
        </div>

        <div class="home__visual">
            <x-helm />
            <x-pirate-flag />
        </div>
    </div>
</section>
