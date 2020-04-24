<?php
namespace App;

// use App\Country;
use Illuminate\Database\Eloquent\Model;


class Studies extends Model
{
	protected $table = 'studies';

	protected $primaryKey = 'id_study';

	protected $fillable = ['id_study','institute','date_start','date_end','degree','id_user','city','type_study','country'];
		public $timestamps = false;


		// public function pais(){
		// 	return $this->hasOne('App\Country','id_country','country');
		// }
}

?>