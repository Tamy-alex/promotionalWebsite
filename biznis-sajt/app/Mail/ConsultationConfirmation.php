<?php

namespace App\Mail;

use Carbon\Carbon;
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
            subject: '✅ Your consultation is confirmed — ' .
            Carbon::parse($this->booking['preferred_date'])->format('d F Y'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.consultation-confirmation',
            with: [
                'booking' => $this->booking,
                'contactInfo' => $this->contactInfo,
            ]
        );
    }


    public function build(): static
    {
        return $this->view('emails.consultation-confirmation')
            ->with([
                'booking' => $this->booking,
                'contactInfo' => $this->contactInfo,
            ])
            ->subject('Your consultation is confirmed');
    }
}
