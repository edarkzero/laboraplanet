<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Plan_users extends Model
{
	protected $table = 'plan_users';
	protected $primaryKey = 'id_user_plan';
	protected $fillable = ['id_user','id_plan','date_start','date_end','state'];
	public $timestamps = false;

}