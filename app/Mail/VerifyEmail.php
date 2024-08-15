<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\VerifyMail;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Mailable{
    use Queueable, SerializesModels;

    public $verificationUrl;  // Variable to hold the verification URL
    public $otp;
    
    /**
     * Create a new message instance.
     */
    public function __construct($otp,$email)
    {
        // Generate a temporary signed URL for email verification
        $this->verificationUrl = URL::temporarySignedRoute(
            'otp.verify.post',  // The named route for OTP verification
            now()->addMinutes(30),  // URL expiration time
            ['otp' => $otp, 'email' => $email]

        );
        $this->otp=$otp;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Your Email Address',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'otp',  // Ensure this view file exists
            with: ['verificationUrl' => $this->verificationUrl,"otp"=>$this->otp],  // Pass the URL to the view
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
