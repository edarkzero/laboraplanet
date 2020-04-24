<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LaboChatInforma extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;
    
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    public function build()
    {
        return $this->from('adminlabora@laboraplanet.com','LABORAPLANET')
                    ->subject('TIENES UN NUEVO MENSAJE EN LABORAPLANET')
                    ->view('mail.labochatinforma');
    }
}