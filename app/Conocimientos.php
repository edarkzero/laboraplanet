<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Conocimientos extends Model
{
	protected $table = 'conocimientos';
	protected $primaryKey = 'idconocimiento';
	protected $fillable = ['idconocimiento','id_ability','descripcion','flag'];

	public $timestamps = false;
    // public $incrementing = false;
}
