<?php
namespace App;

// use App\Country;
use Illuminate\Database\Eloquent\Model;


class Favorites extends Model
{
	protected $table = 'favorites';

	protected $primaryKey = 'id_freelancer_favorite';

	protected $fillable = ['id_freelancer_favorite','id_user','id_favorite','type_favorite'];
		public $timestamps = false;


		public function usuario(){
			return $this->hasOne('App\User','id','id_favorite');
		}
}

?>