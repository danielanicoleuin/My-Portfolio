Author: Daniela Nicole E. Ruin

block:E

A personal student portfolio built with Laravel 13, Blade, custom CSS/JavaScript and Typed.js.
It is themed as an adventure across the Grand Line: a wooden ship helm that turns with the typing
animation, animated ocean, a wanted-poster profile, ability cards, an island-style interests gallery,
a journey timeline, a message-in-a-bottle contact form, a Log Pose compass in the navbar and
treasure-map dividers between sections.

All artwork is original (SVG/CSS). No official One Piece logos or character art are used.

Requirements

•
PHP 8.4 or newer (the installed Composer dependencies require it) with the pdo_sqlite, mbstring, openssl and fileinfo extensions

•
Composer

•
Internet access in the browser (Google Fonts, Font Awesome and Typed.js load from a CDN)

•
Node.js is not required: the site uses plain files in public/

If you use XAMPP, check your version with php -v in the XAMPP shell. If it is older than 8.4,
install a newer PHP (for example from 

https://php.new ) and use that for the commands below.
XAMPP's MySQL is not needed: the project uses SQLite.

Run it locally

Open a terminal (VS Code: Terminal > New Terminal) in the project folder, then:

Bash


composer install                 # only if the vendor/ folder is missing
copy .env.example .env           # macOS/Linux: cp .env.example .env
php artisan key:generate
php artisan migrate              # creates database/database.sqlite tables (answer "yes" if asked to create the file)
php artisan serve



Open 
http://127.0.0.1:8000 in your browser.

Run the automated tests with:

Bash


php artisan test



Using XAMPP's Apache instead of artisan serve

Point an Apache virtual host (or the document root) at the project's public/ folder, never the project root.

Make it yours

Everything on the page comes from config/portfolio.php. Replace each [PLACEHOLDER] and add or remove list items:

Section
Config key
Name, initials, course, school, photo
owner
Welcome text and typed titles
home
Wanted poster and About text
about
Skills (add/remove freely)
skills
Interests and islands
interests
Education timeline
education
Email, Facebook, GitHub, other links
contact (empty values are hidden)




Put your profile photo at public/images/profile/profile.jpg. To show your own photo on an interest card,
add 'image' => 'images/interests/your-photo.jpg' to that interest.

After editing the config, refresh the page. If you ever run php artisan config:cache, run
php artisan config:clear before editing again.

Contact form

The form is validated on the server, protected by CSRF and rate limited (5 requests per minute).

•
By default MAIL_MAILER=log, so messages are written to storage/logs/laravel.log and nothing is emailed.

•
To receive real email, set PORTFOLIO_CONTACT_TO=you@example.com and your SMTP settings (MAIL_MAILER=smtp, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD) in .env, then run php artisan config:clear.

•
Never commit your .env file.

Project structure

Plain Text


app/Http/Controllers/    PortfolioController (page), ContactController (form)
app/Http/Requests/       ContactRequest (validation)
app/Mail/                ContactMessage
config/portfolio.php     all editable content
resources/views/
    layouts/app.blade.php
    portfolio.blade.php  assembles the sections and dividers
    sections/            home, about, skills, interests, education, contact
    components/          navbar, log-pose, footer, helm, ocean, sky, sailing-ship, pirate-flag,
                         wanted-poster, skill-card, interest-card, island-art, message-bottle,
                         map-divider, section-heading
public/css/              style.css, animations.css
public/js/               script.js (reveal), typing.js + helm-animation.js (typed titles drive the helm),
                         navigation.js, log-pose.js, ocean.js, timeline.js, contact.js



Accessibility and performance

•
Animations respect prefers-reduced-motion.

•
Decorative art is hidden from screen readers; the page has a skip link and keyboard-friendly menu.

•
Hero animations pause while the hero is off-screen.

