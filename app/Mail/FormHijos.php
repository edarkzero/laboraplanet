<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormHijos extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;
    public $adjunto;
    public $adjunto2;
    public $type;
    public $type2;
    public $name;
    public $name2;

    public function __construct($demo,$adjunto,$adjunto2,$type,$type2,$name,$name2)
    {

        $this->demo = $demo;
        $this->adjunto = $adjunto;
        $this->adjunto2 = $adjunto2;
        $this->$type = $type;
        $this->$type2 = $type2;
        $this->name = $name;
        $this->name2 = $name2;
    }


    public function build()
    {
//      echo $this->$adjuntoty;
//      exit();
        return $this->from('adminlabora@laboraplanet.com','LABORAPLANET')
                    ->subject('Solicitud Revisión trabajadores con hijos')
                    ->view('mail.solicitud_hijos')
                    ->attach($this->adjunto,[
                        'as'=>$this->name,
                        'mime'=>$this->type,
                    ])
                    ->attach($this->adjunto2,[
                        'as'=>$this->name2,
                        'mime'=>$this->type2,
                    ]);
    }
}
