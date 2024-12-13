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
        public $token,
        public $reporterEmail,
        public $description,
        public $ownerName,
        public $ownerEmail,
        public $wallpaperName,

    )
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('anisukidev01@gmail.com', 'Anisuki Report'),
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
                'token' => $this->token,
                'reporterEmail' => $this->reporterEmail,
                'description' => $this->description,
                'ownerName' => $this->ownerName,
                'ownerEmail' => $this->ownerEmail,
                'wallpaperName' => $this->wallpaperName,
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
