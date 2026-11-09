@props(['nav'])

{{-- Original Log Pose-inspired compass: its needle swings toward the section being read (see public/js/log-pose.js). --}}
<div class="log-pose" id="log-pose" role="img"
     aria-label="Log Pose pointing to {{ $nav[0]['label'] ?? 'Home' }}">
    <svg class="log-pose__svg" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
        <circle cx="32" cy="32" r="29" fill="#172C40" stroke="#D6A84B" stroke-width="3"/>
        <circle cx="32" cy="32" r="23" fill="#101D35" stroke="#D6A84B" stroke-opacity=".45" stroke-width="1"/>
        <g stroke="#E8D8B5" stroke-opacity=".6" stroke-width="1.2" stroke-linecap="round">
            @for ($i = 0; $i < 12; $i++)
                <path transform="rotate({{ $i * 30 }} 32 32)" d="M32 11 V{{ $i % 3 === 0 ? 15 : 13 }}"/>
            @endfor
        </g>
        <g class="log-pose__needle" data-log-pose-needle>
            <path d="M32 10 L37.5 32 L26.5 32 Z" fill="#B52D32"/>
            <path d="M32 54 L37.5 32 L26.5 32 Z" fill="#E8D8B5"/>
        </g>
        <circle cx="32" cy="32" r="3.5" fill="#D6A84B" stroke="#8E6A22" stroke-width="1"/>
        <path d="M13 24 A21 21 0 0 1 28 11" fill="none" stroke="#FFFFFF" stroke-opacity=".28" stroke-width="2.5" stroke-linecap="round"/>
    </svg>
    <span class="log-pose__label" data-log-pose-label aria-hidden="true">{{ $nav[0]['label'] ?? 'Home' }}</span>
</div>
