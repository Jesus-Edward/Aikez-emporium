<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $mailMessage;
    public $mailSubject;
    public $mailTitle;
    public $unsubscribe_token;
    /**
     * Create a new message instance.
     */
    public function __construct($mailMessage, $mailSubject, $mailTitle, $unsubscribe_token)
    {
        $this->mailSubject = $mailSubject;
        $this->mailMessage = $mailMessage;
        $this->mailTitle = $mailTitle;
        $this->unsubscribe_token = $unsubscribe_token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailSubject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.newsletter_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
