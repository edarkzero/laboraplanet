<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Work_Experiences extends Model 
{
	protected $table = 'work_experiences';

	protected $primaryKey = 'id_experiencie';

	protected $fillable = ['id_experiencie','company','date_start','date_end','charge','description_profile','id_user','city','country'];
	// public $incrementing = false;
		public $timestamps = false;
	

}




?>