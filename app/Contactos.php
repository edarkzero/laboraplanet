<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
	protected $table = 'contactos';
	protected $primaryKey = 'id';
	protected $fillable = ['id','id_usuario','id_contacto'];

	public $timestamps = false;
    // public $incrementing = false;
}