<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NotifVerify extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user,$details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,User $user)
    {
        $this->user =   $user;
        $this->details =   $details;
    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notify',['user'=> $this->user,'details'=>$this->details]);
    }
}
