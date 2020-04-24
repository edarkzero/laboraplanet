<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Departaments extends Model
{
    
    protected $table= 'departaments';

    protected $primaryKey='id_departament';
    
	protected $fillable = ['id_departament','code_departament','name_departament','id_country'];

	
}

