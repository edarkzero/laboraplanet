<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ValidarCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;
    // public $usuario;

    public function __construct($demo)
    {
        $this->demo = $demo;
        // $this->usuario = $usuario;
    }


    public function build()
    {
        return $this->from('adminlabora@laboraplanet.com','LABORAPLANET')
                    ->subject('CONFIRMACION DE CORREO ELECTRONICO')
                    ->view('mail.validar_correo');
    }
}
