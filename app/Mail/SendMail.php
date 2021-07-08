<?php

namespace App\Mail;

use App\Models\SendMail as ModelsSendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Contributions and Concerns")
                    ->from('raymond@zentechgh.com', 'Softex Ghana')
                    ->markdown('sendmail', [
                        'name' => $this->data->name,
                        'email' => $this->data->email,
                        'phone_number' => $this->data->phone_number,
                        'message' => $this->data->message
                    ]);
    }
}
