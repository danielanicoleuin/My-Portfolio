<section id="interests" class="section section--interests" aria-labelledby="interests-title">
    <div class="interests__decor" aria-hidden="true">
        <i class="interests__decor-item interests__decor-item--1 fa-solid fa-compass"></i>
        <i class="interests__decor-item interests__decor-item--2 fa-solid fa-anchor"></i>
        <i class="interests__decor-item interests__decor-item--3 fa-solid fa-ship"></i>
    </div>

    <div class="container">
        <x-section-heading id="interests-title" eyebrow="Interests" title="MY ADVENTURES" />

        <ul class="interest-grid" role="list">
            @foreach ($interests as $i => $interest)
                <li class="interest-item" data-reveal style="--reveal-delay: {{ ($i % 3) * .1 }}s">
                    <x-interest-card :interest="$interest" :n="$i + 1" />
                </li>
            @endforeach
        </ul>
    </div>
</section>
