@props(['interest', 'n' => 1])

@php
    $variant  = (($n - 1) % 6) + 1;
    $image    = $interest['image'] ?? '';
    $hasImage = $image !== '' && file_exists(public_path($image));
@endphp

<article class="interest-card island--{{ $variant }}">
    <div class="interest-card__media">
        <div class="interest-card__art">
            @if ($hasImage)
                <img src="{{ asset($image) }}" alt="{{ $interest['title'] }}" loading="lazy">
            @else
                <x-island-art :n="$n" />
            @endif
        </div>

        <span class="interest-card__island">{{ $interest['island'] ?? '' }}</span>
        <i class="interest-card__float interest-card__float--1 fa-solid fa-dove" aria-hidden="true"></i>
        <i class="interest-card__float interest-card__float--2 fa-solid fa-star" aria-hidden="true"></i>
        <span class="interest-card__badge"><i class="{{ $interest['icon'] ?? 'fa-solid fa-compass' }}" aria-hidden="true"></i></span>
    </div>

    <div class="interest-card__body">
        <h3 class="interest-card__title">{{ $interest['title'] }}</h3>
        @if (!empty($interest['description']))
            <p>{{ $interest['description'] }}</p>
        @endif
    </div>
</article>
