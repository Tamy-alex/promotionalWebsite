<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConsultationOwnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly array $booking,
        public readonly array $contactInfo,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📅 New Booking — ' . $this->booking['client_name'] . ' on ' . $this->booking['preferred_date'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.consultation-owner-notification',
            with: [
                'booking' => $this->booking,
                'contactInfo' => $this->contactInfo,
            ]
        );
    }

    // REQUIRED for Laravel 8 (SwiftMailer)
    public function build()
    {
        return $this->view('emails.consultation-owner-notification')
            ->with([
                'booking' => $this->booking,
                'contactInfo' => $this->contactInfo,
            ])
            ->subject('📅 New Booking — ' . $this->booking['client_name'] . ' on ' . $this->booking['preferred_date']);
    }
}
