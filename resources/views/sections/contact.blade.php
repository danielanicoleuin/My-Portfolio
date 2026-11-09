@php
    $isSafeUrl = fn ($url) => is_string($url) && preg_match('#^(https?://|mailto:)#i', $url) === 1;

    $links = [];
    if (!empty($contact['email'])) {
        $links[] = ['label' => $contact['email'], 'url' => 'mailto:' . $contact['email'], 'icon' => 'fa-solid fa-envelope', 'external' => false];
    }
    if (!empty($contact['facebook'])) {
        $links[] = ['label' => 'Facebook', 'url' => $contact['facebook'], 'icon' => 'fa-brands fa-facebook', 'external' => true];
    }
    if (!empty($contact['github'])) {
        $links[] = ['label' => 'GitHub', 'url' => $contact['github'], 'icon' => 'fa-brands fa-github', 'external' => true];
    }
    foreach ($contact['other'] ?? [] as $other) {
        $links[] = ['label' => $other['label'] ?? 'Link', 'url' => $other['url'] ?? '', 'icon' => $other['icon'] ?? 'fa-solid fa-link', 'external' => true];
    }
    $links = array_values(array_filter($links, fn ($l) => $isSafeUrl($l['url'])));
@endphp

<section id="contact" class="section section--contact" aria-labelledby="contact-title">
    <div class="container">
        <x-section-heading id="contact-title" eyebrow="Contact" title="SEND A MESSAGE" />

        <div class="contact__grid">
            <div class="contact__side" data-reveal>
                <x-message-bottle />

                <p class="contact__lead">Got a question, an idea, or just want to say hello? Drop a message in the bottle and it will find its way to me.</p>

                @if (count($links))
                    <ul class="contact__links" role="list">
                        @foreach ($links as $link)
                            <li>
                                <a class="contact-link" href="{{ $link['url'] }}"
                                   @if ($link['external']) target="_blank" rel="noopener noreferrer" @endif>
                                    <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                                    <span>{{ $link['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="section-placeholder">Contact links will appear here once they are added.</p>
                @endif
            </div>

            <div class="contact__form-wrap" data-reveal style="--reveal-delay:.1s">
                <form class="contact-form parchment" id="contact-form" method="POST" action="{{ route('contact.store') }}">
                    @csrf

                    @if (session('status'))
                        <div class="form-alert form-alert--success" role="status">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i> {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="form-alert form-alert--error" role="alert">
                            <i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i> {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="form-alert form-alert--error" role="alert">
                            <i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i> Please fix the highlighted fields and try again.
                        </div>
                    @endif

                    <div class="form-field">
                        <label for="cf-name">Full Name</label>
                        <input id="cf-name" name="name" type="text" value="{{ old('name') }}" maxlength="100" required autocomplete="name"
                               @error('name') aria-invalid="true" aria-describedby="cf-name-error" @enderror>
                        @error('name') <p class="form-error" id="cf-name-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-field">
                        <label for="cf-email">Email</label>
                        <input id="cf-email" name="email" type="email" value="{{ old('email') }}" maxlength="150" required autocomplete="email"
                               @error('email') aria-invalid="true" aria-describedby="cf-email-error" @enderror>
                        @error('email') <p class="form-error" id="cf-email-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-field">
                        <label for="cf-subject">Subject</label>
                        <input id="cf-subject" name="subject" type="text" value="{{ old('subject') }}" maxlength="150" required
                               @error('subject') aria-invalid="true" aria-describedby="cf-subject-error" @enderror>
                        @error('subject') <p class="form-error" id="cf-subject-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-field">
                        <label for="cf-message">Message</label>
                        <textarea id="cf-message" name="message" rows="6" minlength="10" maxlength="3000" required
                                  @error('message') aria-invalid="true" aria-describedby="cf-message-error" @enderror>{{ old('message') }}</textarea>
                        @error('message') <p class="form-error" id="cf-message-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Honeypot: hidden from people, tempting for bots --}}
                    <div class="contact-form__hp" aria-hidden="true">
                        <label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                    </div>

                    <button type="submit" class="btn btn--red contact-form__submit" id="contact-submit">
                        <i class="fa-solid fa-paper-plane" aria-hidden="true"></i> <span>Send Message</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
