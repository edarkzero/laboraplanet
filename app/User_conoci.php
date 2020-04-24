<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User_conoci extends Model
{
	protected $table = 'user_conoci';

	protected $primaryKey = 'id_user_cono';

	protected $fillable = ['id','idconocimiento'];

    public $incrementing = false;
		public $timestamps = false;


}

?>

