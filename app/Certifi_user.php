<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Certifi_user extends Model
{
	protected $table = 'certifi_user';
	protected $primaryKey = 'id_cer';
	protected $fillable = ['id','nombre_cer','id_patroc','fec_expe','fec_cadu','id_creden','url_creden'];


	public $timestamps = false;
}
