<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarDatosTrabajador extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        
    }


    public function build()
    {
        return $this->from('adminlabora@laboraplanet.com','LABORAPLANET')
                    ->subject('LABORAPLANET INFORMA')
                    ->view('mail.enviardatos_trabajador');
    }
}
