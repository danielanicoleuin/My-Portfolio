@props(['eyebrow' => null, 'title', 'id' => null])

<header class="section-heading" data-reveal>
    @if ($eyebrow)
        <p class="section-heading__eyebrow">{{ $eyebrow }}</p>
    @endif
    <h2 class="section-heading__title" @if ($id) id="{{ $id }}" @endif>{{ $title }}</h2>
    <span class="section-heading__rule" aria-hidden="true"></span>
</header>
