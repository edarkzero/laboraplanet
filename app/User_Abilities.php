<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Abilities extends Model
{
    protected $table= 'user_abilities';
    protected $primaryKey='id_user_ability';
    protected $fillable = ['id_user','id_ability'];
	public $timestamps = false;

	  public function trabajadores()
    {
        return $this->hasMany('App\Abilities','id_ability','id_ability');
    }
    public function nota(){
    	return $this->hasOne('App\Apply_format','id_user','id_user');
    }
    public function contar(){
        return $this->hasMany('App\Abilities','id_ability','id_ability');
    }
}

