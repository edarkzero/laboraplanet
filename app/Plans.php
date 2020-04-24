<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
	protected $table = 'plans';
	protected $primaryKey = 'id_plan';
	protected $fillable = ['id_plan','name_plan','description','price','time_during','type_time'];
}