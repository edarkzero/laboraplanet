<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
	protected $table = 'notifications';
	protected $primaryKey = 'id_notification';
	protected $fillable = ['destination','type_notification','author','viewed','date_done','titlep','description','id_job_apply','url'];


	public $timestamps = false;
}