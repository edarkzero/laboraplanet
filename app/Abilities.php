<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Abilities extends Model
{
	protected $table = 'abilities';
	protected $primaryKey = 'id_ability';
	protected $fillable = ['id_ability','id_category','ability'];

	public function usuario(){
		return $this->hasMany('App\User_Abilities','id_ability','id_ability');
	}
}