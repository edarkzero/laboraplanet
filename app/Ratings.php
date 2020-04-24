<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
	protected $table = 'ratings';
	protected $primaryKey = 'id_qualification';
	protected $fillable = ['qualification','commit_finish','bars','medals','date_finish','id_user','id_apply_job','id_user_set','per'];

	public $timestamps = false;


	public function usuario(){
		return $this->hasOne(User::class,'id','id_user');
	}

	   //  public function countconvocatorias(){
    //   return $this->hasOne(Convocatorias::class,'c_codfac','c_codfac')
    //   						  ->selectRaw('c_codfac,count(*) as count')
    //   						  ->where('n_flag',1)
    //   						  ->groupBy(['c_codfac']);
    // }

}