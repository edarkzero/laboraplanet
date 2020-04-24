<?php
namespace App;

// use App\Country;
use Illuminate\Database\Eloquent\Model;


class Solici_men extends Model
{
	protected $table = 'solici_men';

	protected $primaryKey = 'id_solici';

	protected $fillable = ['id','nombre_usu','nhijos','tele_usu','aprob_men','det_observ'];
  
	public $timestamps = false;


		// public function pais(){
		// 	return $this->hasOne('App\Country','id_country','country');
		// }
}

?>
