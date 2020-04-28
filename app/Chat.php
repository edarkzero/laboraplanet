<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Events\BroadcastChat;
class Chat extends Model
{
	protected $table = 'chat';
	// protected $primaryKey = 'id';
	protected $fillable = ['id','id_usuario','id_contacto','chat','v','file','file_name','fecha','proyecto'];
	public $timestamps = false;
	protected $dispatchesEvents= [
		'created'=>BroadcastChat::class
	];
}