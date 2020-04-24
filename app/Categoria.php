<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    

	public $timestamps = false;
    protected $table= 'categories_ability';

    protected $primaryKey='id_category';
    
	protected $fillable = ['id_category','txtcomplejidad','description','flag'];

	// public $incrementing = false;




}