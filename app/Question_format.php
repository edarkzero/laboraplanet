<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_format extends Model
{
    protected $table= 'questions_format';
    protected $primaryKey='id_question';
    protected $fillable = ['id_format','concept'];
	public $timestamps = false;

	public function respuestas(){
		return $this->HasMany('App\Options_questions','id_question','id_question');
	}
}

