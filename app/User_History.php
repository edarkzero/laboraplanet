<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User_History extends Model 
{
	protected $table = 'user_history';

	protected $primaryKey = 'id';

	protected $fillable = ['id','id_user','descripcion','date'];
	// public $incrementing = false;
		public $timestamps = false;
	

}




?>