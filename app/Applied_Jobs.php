<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applied_Jobs extends Model
{
    

	public $timestamps = false;
    protected $table= 'applied_jobs';

    protected $primaryKey='id_trabajo_aplicado';
    
    protected $fillable=['id_project','id_user_employee','id_user_employer','state_aplication','presentacion','economic_proposal','sinnueve','time_finish','type_time','date_contract','document','affair','file_name'];
	// protected $fillable = ['id_category','description'];

	// public $incrementing = false;




}