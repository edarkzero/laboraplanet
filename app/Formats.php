<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Formats extends Model
{
    protected $table= 'formats';
    protected $primaryKey='id_format';
    protected $fillable = ['name_format','id_ability','level_format','certification',];
	public $timestamps = false;

	public function preguntas(){
		return $this->hasMany('App\Question_format','id_format','id_format');
		        // return $this->hasOne('App\Formats','id_format','id_format');

	}
}

