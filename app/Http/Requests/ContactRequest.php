<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * On validation errors, return to the contact section instead of the top of the page.
     */
    protected $redirect = '/#contact';

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email:rfc', 'max:150'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'    => 'Please tell me your name.',
            'email.required'   => 'Please enter your email address.',
            'email.email'      => 'That email address does not look right.',
            'subject.required' => 'Please add a subject.',
            'message.required' => 'Please write a message.',
            'message.min'      => 'Your message is a little short. Please write at least :min characters.',
            'message.max'      => 'Your message is too long. Please keep it under :max characters.',
        ];
    }
}
