<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormHijos extends Mailable
{
    use Queueable, SerializesModels;

    //public $demo;


    public function __construct()
    {

        //$this->demo = $demo;

    }


    public function build()
    {

        return $this->from('adminlabora@laboraplanet.com','LABORAPLANET')
                    ->subject('Informe de Solicitud enviada a LaboraPlanet')
                    ->view('mail.solicitud_hijos2');
    }
}
