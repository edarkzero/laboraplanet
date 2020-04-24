<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PagoPropuesta extends Mailable
{
    use Queueable, SerializesModels;

    public $demo2;

    public function __construct($demo2)
    {
        $this->demo2 = $demo2;
    }

    public function build()
    {
        return $this->from('adminlabora@laboraplanet.com','LABORAPLANET')
                    ->subject('INFORMACION DE PAGO')
                    ->view('mail.pago_propuesta');
    }
}
