<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Money_moves extends Model 
{
	protected $table = 'money_moves';

	protected $primaryKey = 'id_move';

	protected $fillable = ['move','description','import_move','date_move','user_id'];
	// public $incrementing = false;
	public $timestamps = false;
	

}




?>