<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postal_codes extends Model
{
    

	public $timestamps = false;
    protected $table= 'postal_codes';

    protected $primaryKey='id_postal_code';
    
    protected $fillable=['id_postal_code','code_postal'];

	// public $incrementing = false;




}
