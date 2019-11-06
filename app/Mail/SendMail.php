<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sub;
    public $mes;
    public $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $message, $date)
    {
        $this->sub = $subject;
        $this->mes = $message;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;
        $e_message = [
            'message' => $this->mes,
            'date' => $this->date
        ];
        
        return $this->view('mail.sendmail', compact('e_message'))->subject($e_subject);
    }
}
