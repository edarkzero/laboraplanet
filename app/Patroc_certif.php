<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Patroc_certif extends Model
{
	protected $table = 'patroc_certif';
	protected $primaryKey = 'id_patroc';
	protected $fillable = ['nom_patr_cert','logo_patr_cert','enlace_cert','flag_cert'];


	public $timestamps = false;
}
