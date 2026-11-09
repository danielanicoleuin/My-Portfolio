@props(['skill', 'category' => ''])

{{-- Collectible ability card. No levels or percentages: only what the student chooses to list. --}}
<article class="skill-card">
    <span class="skill-card__shine" aria-hidden="true"></span>
    <i class="skill-card__star skill-card__star--l fa-solid fa-star" aria-hidden="true"></i>
    <i class="skill-card__star skill-card__star--r fa-solid fa-star" aria-hidden="true"></i>

    @if ($category !== '')
        <p class="skill-card__category">{{ $category }}</p>
    @endif

    <div class="skill-card__medallion">
        <span class="skill-card__ring" aria-hidden="true"></span>
        <i class="{{ $skill['icon'] ?? 'fa-solid fa-star' }}" aria-hidden="true"></i>
    </div>

    <h4 class="skill-card__name">{{ $skill['name'] }}</h4>
    <span class="skill-card__rule" aria-hidden="true"></span>
</article>
