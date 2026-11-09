@props(['owner', 'about'])

@php
    [$wantedWord, $wantedTagline] = array_pad(array_map('trim', explode(':', $about['heading'], 2)), 2, '');
    $hasPhoto = !empty($owner['profile_image']) && file_exists(public_path($owner['profile_image']));
@endphp

{{-- One Piece-style wanted poster (original design). No bounty is shown. --}}
<div class="wanted-poster" data-unfold>
    <div class="wanted-poster__paper">
        <span class="wp-gold wp__frame" aria-hidden="true"></span>
        <i class="wp-gold wp__corner wp__corner--tl fa-solid fa-star" aria-hidden="true"></i>
        <i class="wp-gold wp__corner wp__corner--tr fa-solid fa-star" aria-hidden="true"></i>
        <i class="wp-gold wp__corner wp__corner--bl fa-solid fa-star" aria-hidden="true"></i>
        <i class="wp-gold wp__corner wp__corner--br fa-solid fa-star" aria-hidden="true"></i>
        <span class="wp__nail wp__nail--l" aria-hidden="true"></span>
        <span class="wp__nail wp__nail--r" aria-hidden="true"></span>

        <h3 class="wp__heading wp-fade" style="--i:0">
            <span class="wp__wanted">{{ $wantedWord }}</span>
            @if ($wantedTagline !== '')
                <span class="sr-only">: </span>
                <span class="wp__tagline">{{ $wantedTagline }}</span>
            @endif
        </h3>

        <div class="wp__photo">
            @if ($hasPhoto)
                <img src="{{ asset($owner['profile_image']) }}" alt="Portrait of {{ $owner['full_name'] }}" width="800" height="800" loading="lazy">
            @else
                <div class="wp__photo-fallback" role="img" aria-label="Profile picture placeholder">{{ $owner['initials'] }}</div>
            @endif
        </div>

        <p class="wp__name wp-fade" style="--i:1">{{ $owner['full_name'] }}</p>
        <p class="wp__role wp-fade" style="--i:2">{{ $owner['student_title'] ?? 'Student' }}</p>

        <ul class="wp__facts wp-fade" style="--i:3">
            <li><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i> {{ $owner['course'] }}</li>
            <li><i class="fa-solid fa-school" aria-hidden="true"></i> {{ $owner['school'] }}</li>
        </ul>

        <p class="wp__intro wp-fade" style="--i:4">{{ $about['poster_intro'] ?? '' }}</p>
    </div>
</div>
