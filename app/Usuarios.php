<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    

	
    protected $table= 'usuario';

    protected $primaryKey='id';
    
	// protected $fillable = ['id','usuario','correo','pass','estado','pais','perfil','telefono','apellidos','nombres','direccion','documento','precio_hora','nit','descripcion','razon_social','telefono_empresa','direccion_empresa','nombre_empresa','gender','type_money','authorization_send_email','postalCode','date_ingress','connected','enviar'];

    const CREATED_AT = 'd_fecreg';
    const UPDATED_AT = 'd_fecact';

	
	public $incrementing = false;




}