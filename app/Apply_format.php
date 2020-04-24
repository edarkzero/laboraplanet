<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply_format extends Model
{
    protected $table= 'apply_format';
    protected $primaryKey='id_apply_format';
    protected $fillable = ['id_user','number_attemps','id_format','qualify','certificate'];
	public $timestamps = false;

    public function habilidad(){
        return $this->hasOne('App\Formats','id_format','id_format');
    }

}

