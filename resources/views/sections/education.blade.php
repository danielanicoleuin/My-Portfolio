@php
    $markerIcons = ['fa-solid fa-anchor', 'fa-solid fa-sailboat', 'fa-solid fa-compass', 'fa-solid fa-ship'];
@endphp

<section id="education" class="section section--education" aria-labelledby="education-title">
    <div class="container">
        <x-section-heading id="education-title" eyebrow="Education" title="MY JOURNEY" />

        <div class="timeline" id="timeline">
            <div class="timeline__line" aria-hidden="true"><span class="timeline__line-fill"></span></div>

            <ol class="timeline__list">
                @foreach ($education as $i => $entry)
                    <li class="timeline__item" data-reveal>
                        <span class="timeline__marker" aria-hidden="true">
                            <i class="{{ $markerIcons[$i % count($markerIcons)] }}"></i>
                        </span>
                        <article class="timeline__card parchment">
                            <p class="timeline__stop">Stop {{ $i + 1 }}</p>
                            <h3 class="timeline__level">{{ $entry['level'] }}</h3>
                            <p class="timeline__school"><i class="fa-solid fa-school" aria-hidden="true"></i> {{ $entry['school'] }}</p>
                            <p class="timeline__years"><i class="fa-regular fa-calendar" aria-hidden="true"></i> {{ $entry['years'] }}</p>
                            @if (!empty($entry['description']))
                                <p class="timeline__desc">{{ $entry['description'] }}</p>
                            @endif
                        </article>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>
