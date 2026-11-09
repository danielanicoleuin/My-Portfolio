<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('portfolio.owner.full_name') . ' | Grand Line Portfolio')</title>
    <meta name="description" content="Personal portfolio of {{ config('portfolio.owner.full_name') }}, a One Piece-inspired adventure through the Grand Line.">
    <meta name="theme-color" content="#101D35">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Inter:wght@400;500;600;700&family=Pirata+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    @stack('styles')
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>

    <x-navbar :owner="$owner" :nav="$nav" />

    <main id="main">
        @yield('content')
    </main>

    <x-footer :owner="$owner" :nav="$nav" :contact="$contact" />

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.1.0/dist/typed.umd.js" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/navigation.js') }}" defer></script>
    <script src="{{ asset('js/log-pose.js') }}" defer></script>
    <script src="{{ asset('js/typing.js') }}" defer></script>
    <script src="{{ asset('js/helm-animation.js') }}" defer></script>
    <script src="{{ asset('js/ocean.js') }}" defer></script>
    <script src="{{ asset('js/timeline.js') }}" defer></script>
    <script src="{{ asset('js/contact.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
