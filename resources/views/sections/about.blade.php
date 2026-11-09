@php
    $topics = [
        ['title' => 'My Personality',        'icon' => 'fa-solid fa-face-smile', 'text' => $about['personality']],
        ['title' => 'My Goals',              'icon' => 'fa-solid fa-bullseye',   'text' => $about['goals']],
        ['title' => 'My Personal Background', 'icon' => 'fa-solid fa-scroll',     'text' => $about['background']],
    ];
@endphp

<section id="about" class="section section--about" aria-labelledby="about-title">
    <div class="container">
        <x-section-heading id="about-title" eyebrow="About Me" title="MEET THE CREW" />

        <div class="about__grid">
            <x-wanted-poster :owner="$owner" :about="$about" />

            <div class="about__details">
                <div class="crew-card" data-reveal>
                    <h3 class="crew-card__title"><i class="fa-solid fa-anchor" aria-hidden="true"></i> Crew Profile</h3>
                    <dl class="crew-card__list">
                        <div><dt>Full Name</dt><dd>{{ $owner['full_name'] }}</dd></div>
                        <div><dt>Course</dt><dd>{{ $owner['course'] }}</dd></div>
                        <div><dt>School</dt><dd>{{ $owner['school'] }}</dd></div>
                        <div><dt>Year Level</dt><dd>{{ $owner['year_level'] }}</dd></div>
                        @if (!empty($owner['location']))
                            <div><dt>Location</dt><dd>{{ $owner['location'] }}</dd></div>
                        @endif
                    </dl>
                </div>

                <p class="about__description" data-reveal style="--reveal-delay:.1s">{{ $about['description'] }}</p>

                <div class="about__topics">
                    @foreach ($topics as $i => $topic)
                        <article class="topic-card" data-reveal style="--reveal-delay: {{ .15 + $i * .12 }}s">
                            <h3 class="topic-card__title"><i class="{{ $topic['icon'] }}" aria-hidden="true"></i> {{ $topic['title'] }}</h3>
                            <p>{{ $topic['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
