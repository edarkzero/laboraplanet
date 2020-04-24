<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    

	
    protected $table= 'countries';

    protected $primaryKey='id_country';
    
	protected $fillable = ['id_country','code_country','name_country'];

	// public $incrementing = false;




}