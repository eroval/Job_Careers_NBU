<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filename, $subject, $job_name)
    {
        $this->filename=$filename;
        $this->subject=$subject;
        $this->job_name=$job_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.candidacy', ['job_name' => $this->job_name])
                    ->subject($this->subject)
                    ->attach($this->filename->getRealPath(), array(
                        'as' => $this->filename->getClientOriginalName(),
                        'mime' => $this->filename->getMimeType())
                    );
    }
}
