<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    

	public $incrementing = false;
	public $timestamps = false;
    protected $table= 'accounts';

    protected $primaryKey='id_account';
    
    protected $fillable=['number_account','date_expitry','type_card','id_user','email','type_card_bancaria','code_security','address','country','city','name_headline','last_name_headline','state_or_province','code_postal'];




}
