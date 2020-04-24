<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
// use App\Events\BroadcastChat;
class Select_project extends Model
{
	protected $table = 'select_project';
	// protected $primaryKey = 'id';
	protected $fillable = ['id','id_contactos','proyecto'];
	public $timestamps = false;
	// protected $dispatchesEvents= [
	// 	'created'=>BroadcastChat::class
	// ];
}