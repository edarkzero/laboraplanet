<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Options_questions extends Model
{
    protected $table= 'options_questions';
    protected $primaryKey='id_option_question';
    protected $fillable = ['id_question','option_question','answer'];
	public $timestamps = false;


}

