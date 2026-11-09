<?php

/*
|--------------------------------------------------------------------------
| Portfolio content
|--------------------------------------------------------------------------
| Everything shown on the website lives here. Replace each [PLACEHOLDER]
| with your real information, and add or remove list items freely.
| Nothing here is invented: it is all placeholder text for you to edit.
*/

return [

    'owner' => [
        'full_name'  => 'Daniela Nicole Ruin',
        'initials'   => 'DNR',            // shown in the navbar logo and footer
        'course'     => 'BSIT',
        'school'     => 'Computer Communication Development Institute',
        'year_level' => '3rd Year',
        'student_title' => 'College Student',
        'location'   => 'Sikatuna, Old Albay District, Legazpi City, Albay',    // optional, leave '' to hide
        'profile_image' => 'images/profile/profile.jpg', // put your photo here
    ],

    'home' => [
        'welcome'  => 'WELCOME ABOARD!',
        'intro'    => "Hello, I'm Daniela Nicole Ruin. I'm a college student passionate about technology, creativity, and discovering new opportunities. Every day is another adventure toward learning, improving myself, and achieving my dreams.",
        'titles'   => [
            'College Student',
            'Aspiring Web Developer',
            'Future IT Professional',
            'Technology Enthusiast',
            'Lifelong Learner',
        ],
    ],

    'about' => [
        'heading'     => 'WANTED: A DREAMER WITH BIG AMBITIONS',
        'poster_intro' => 'A college student sailing toward big dreams, one adventure at a time.',
        'description' => "Hi! I'm Daniela Nicole Ruin, a college student who enjoys learning new things, exploring technology, and discovering my interests. I believe that every experience is an opportunity to grow and improve. Just like an adventure across the Grand Line, I'm continuously working toward my goals and dreams.",
        'personality' => "I'm optimistic and non-competitive.",
        'goals'       => 'To be rich.',
        'background'  => 'I am a student who is interested in technology and web development. I enjoy learning new programming skills, designing websites, and creating systems. I am always willing to learn new things and improve my abilities as a future developer.',
    ],

    // Suggested examples only. Edit or remove to match your real abilities.
    'skills' => [
        'technical' => [
            ['name' => 'HTML',                          'icon' => 'fa-brands fa-html5'],
            ['name' => 'CSS',                           'icon' => 'fa-brands fa-css3-alt'],
            ['name' => 'JavaScript',                    'icon' => 'fa-brands fa-js'],
            ['name' => 'PHP',                           'icon' => 'fa-brands fa-php'],
            ['name' => 'MySQL',                         'icon' => 'fa-solid fa-database'],
            ['name' => 'Microsoft Office',              'icon' => 'fa-solid fa-file-word'],
            ['name' => 'Basic Computer Troubleshooting', 'icon' => 'fa-solid fa-screwdriver-wrench'],
        ],
        'general' => [
            ['name' => 'Communication',   'icon' => 'fa-solid fa-comments'],
            ['name' => 'Teamwork',        'icon' => 'fa-solid fa-people-group'],
            ['name' => 'Time Management', 'icon' => 'fa-solid fa-hourglass-half'],
            ['name' => 'Problem-Solving', 'icon' => 'fa-solid fa-puzzle-piece'],
            ['name' => 'Creativity',      'icon' => 'fa-solid fa-lightbulb'],
            ['name' => 'Adaptability',    'icon' => 'fa-solid fa-arrows-spin'],
        ],
    ],

    // Suggested examples only. 'island' is the One Piece-style destination label.
    // Optional: add 'description' => 'a short line' to show text under the title, or 'image' => 'images/interests/photo.jpg' to show your own photo instead of the island illustration.
    'interests' => [
        ['title' => 'Watching Anime',      'island' => 'Island of Stories',   'icon' => 'fa-solid fa-tv',         ],
        ['title' => 'Playing Online Games', 'island' => 'Island of Challenges', 'icon' => 'fa-solid fa-gamepad',    ],
        ['title' => 'Listening to Music',  'island' => 'Island of Melodies',  'icon' => 'fa-solid fa-music',      ],
        ['title' => 'Reading',             'island' => 'Island of Knowledge', 'icon' => 'fa-solid fa-book-open'],
        ['title' => 'Technology',          'island' => 'Island of Inventions', 'icon' => 'fa-solid fa-microchip'],
        ['title' => 'Learning New Skills', 'island' => 'Island of Growth',    'icon' => 'fa-solid fa-seedling',   ],
    ],

    'education' => [
        ['level' => 'Elementary Education',  'school' => 'Estanza Elementary School', 'years' => '2011 - 2017', 'description' => ''],
        ['level' => 'Junior High School',    'school' => 'Taysan Resettlement Integrated School', 'years' => '2017 - 2022', 'description' => ''],
        ['level' => 'Senior High School',    'school' => 'South East Asia', 'years' => '2022 - 2024', 'description' => ''],
        ['level' => 'College',               'school' => 'Computer Communication Development Institute', 'years' => '2024 - 2026', 'description' => ''],
    ],

    // Leave a value as '' to hide that item.
    'contact' => [
        'email'    => 'ruindanielanicolee@gmail.com',
        'facebook' => '',   // full profile URL
        'github'   => '',   // full profile URL
        'other'    => [],   // e.g. [['label' => 'Instagram', 'url' => 'https://...', 'icon' => 'fa-brands fa-instagram']]
    ],

    // Where contact form messages are emailed. Set PORTFOLIO_CONTACT_TO in .env.
    // With MAIL_MAILER=log (the default) messages are written to storage/logs/laravel.log instead.
    'contact_recipient' => env('PORTFOLIO_CONTACT_TO'),

    'nav' => [
        ['id' => 'home',      'label' => 'Home'],
        ['id' => 'about',     'label' => 'About Me'],
        ['id' => 'skills',    'label' => 'Skills'],
        ['id' => 'interests', 'label' => 'Interests'],
        ['id' => 'education', 'label' => 'Education'],
        ['id' => 'contact',   'label' => 'Contact'],
    ],
];
