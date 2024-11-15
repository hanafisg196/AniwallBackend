<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportWallpaper extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected $wallpaperId,
        protected $reportToken,
        protected $reporterName,
        protected $reporterEmail,
        protected $desc,
        protected $ownerName,
        protected $ownerEmail,

    )
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('anisukdev@gmail.com', 'Anisuki Report'),
            subject: 'Wallpaper Report',
        );
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'dashboard.report-mail',
            with:[
                'wallpaperId' => $this->wallpaperId,
                'reportToken' => $this->reportToken,
                'reporterName' => $this->reporterName,
                'reporterEmail' => $this->reporterEmail,
                'wallpaperId' => $this->wallpaperId,
            ]
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
