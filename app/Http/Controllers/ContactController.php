<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        $back = route('home', [], false) . '#contact';

        // Honeypot: real visitors never see or fill this field. Bots often do.
        // Pretend it worked so the bot learns nothing, but send nothing.
        if ($request->filled('website')) {
            return redirect()->to($back)->with('status', $this->successText());
        }

        $data = $request->validated();

        // Keep header-like fields on a single line (prevents header injection).
        foreach (['name', 'subject'] as $field) {
            $data[$field] = trim(preg_replace('/\s+/', ' ', $data[$field]));
        }

        // Falls back to the app's "from" address when no recipient is configured.
        $recipient = config('portfolio.contact_recipient') ?: config('mail.from.address');

        try {
            Mail::to($recipient)->send(new ContactMessage($data));
        } catch (Throwable $e) {
            report($e); // details go to the log only, never to the visitor

            return redirect()->to($back)
                ->withInput()
                ->with('error', 'Sorry, your message could not be sent right now. Please try again in a little while.');
        }

        return redirect()->to($back)->with('status', $this->successText());
    }

    private function successText(): string
    {
        return 'Message sent! Thank you for sailing by. I will reply as soon as I can.';
    }
}
