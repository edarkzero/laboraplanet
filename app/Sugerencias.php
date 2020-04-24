<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugerencias extends Model
{
	protected $table = 'suggestions';
	protected $primaryKey = 'idFile';
	protected $fillable = ['idFile','description','id_user'];

	
	public $incrementing = false;
	public $timestamps = false;
}
