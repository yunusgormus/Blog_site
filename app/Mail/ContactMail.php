<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
{
    return $this->subject('Yeni İletişim Mesajı: ' . $this->data['topic'])
                ->view('mails.contact')
                ->with(['data' => $this->data]);
}
}