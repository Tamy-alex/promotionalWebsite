<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConsultationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly array $booking,
        public readonly array $contactInfo,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your consultation is confirmed — ' . $this->booking['preferred_date'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.consultation-confirmation',
        );
    }
}
