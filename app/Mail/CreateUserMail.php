<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $authentication_token)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '仮登録完了メール',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.create_user',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
