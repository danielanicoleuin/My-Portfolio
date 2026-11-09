@php
    $groups = [
        ['key' => 'technical', 'title' => 'Technical Skills', 'icon' => 'fa-solid fa-laptop-code', 'label' => 'Technical'],
        ['key' => 'general',   'title' => 'General Skills',   'icon' => 'fa-solid fa-compass',     'label' => 'General'],
    ];
@endphp

<section id="skills" class="section section--skills" aria-labelledby="skills-title">
    <div class="container">
        <x-section-heading id="skills-title" eyebrow="Skills" title="MY ABILITIES" />

        @foreach ($groups as $group)
            @if (!empty($skills[$group['key']]))
                <div class="skill-group">
                    <h3 class="skill-group__title" data-reveal>
                        <i class="{{ $group['icon'] }}" aria-hidden="true"></i> {{ $group['title'] }}
                    </h3>
                    <ul class="skill-grid" role="list">
                        @foreach ($skills[$group['key']] as $i => $skill)
                            <li class="skill-item" data-reveal style="--reveal-delay: {{ ($i % 6) * .08 }}s">
                                <x-skill-card :skill="$skill" :category="$group['label']" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endforeach
    </div>
</section>
