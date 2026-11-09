<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'name'    => 'Test Sailor',
            'email'   => 'sailor@example.com',
            'subject' => 'Ahoy',
            'message' => 'Hello there, this is a friendly test message.',
        ], $overrides);
    }

    public function test_form_is_rendered_with_csrf_token_and_all_fields(): void
    {
        $this->get('/')
            ->assertSee('name="_token"', false)
            ->assertSee('name="name"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="subject"', false)
            ->assertSee('name="message"', false)
            ->assertSee('Send Message');
    }

    public function test_all_required_fields_are_validated(): void
    {
        Mail::fake();

        $this->post('/contact', [])
            ->assertRedirect('/#contact')
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        Mail::assertNothingSent();
    }

    public function test_invalid_email_is_rejected(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload(['email' => 'not-an-email']))
            ->assertSessionHasErrors(['email']);

        Mail::assertNothingSent();
    }

    public function test_valid_message_is_sent_and_success_is_flashed(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload())
            ->assertRedirect('/#contact')
            ->assertSessionHas('status')
            ->assertSessionHasNoErrors();

        Mail::assertSent(ContactMessage::class, fn (ContactMessage $mail) => $mail->data['email'] === 'sailor@example.com');
    }

    public function test_line_breaks_are_removed_from_name_and_subject(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload(['subject' => "Hi\r\nBcc: someone@example.com"]));

        Mail::assertSent(ContactMessage::class, fn (ContactMessage $mail) => ! str_contains($mail->data['subject'], "\n"));
    }

    public function test_honeypot_submissions_send_nothing(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload(['website' => 'http://spam.example']))
            ->assertRedirect('/#contact');

        Mail::assertNothingSent();
    }

    public function test_mail_failure_shows_a_friendly_error_without_details(): void
    {
        Mail::shouldReceive('to')->once()->andThrow(new \RuntimeException('smtp password is secret'));

        $response = $this->post('/contact', $this->validPayload());

        $response->assertRedirect('/#contact')->assertSessionHas('error');
        $this->assertStringNotContainsString('secret', session('error'));
    }
}
