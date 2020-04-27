<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Events\BroadcastChat;

/**
 * Class Chat
 * @package App
 * @property-read appliedJob
 */

class Chat extends Model
{
	protected $table = 'chat';
	// protected $primaryKey = 'id';
	protected $fillable = ['id','id_usuario','id_contacto','id_trabajo_aplicado','chat','v','file','file_name','fecha'];
	public $timestamps = false;
	protected $dispatchesEvents= [
		'created'=>BroadcastChat::class
	];

    public function appliedJob()
    {
        return $this->hasOne('App\Applied_Jobs','id_trabajo_aplicado','id_trabajo_aplicado');
    }
}