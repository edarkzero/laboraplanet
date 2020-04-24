<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreements extends Model
{
    

	public $timestamps = false;
    protected $table= 'agreements';

    protected $primaryKey='id_trabajo_aplicado';
    
    protected $fillable=['id_trabajo_aplicado','id_agreement','agreement','state_agreement','date_agreement','id_apply_job','affair','id_user_get','id_user_set','doc'];
	// protected $fillable = ['id_category','description'];

	// public $incrementing = false;




}
