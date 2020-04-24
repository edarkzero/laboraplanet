<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Categories extends Model
{
    protected $table= 'user_categories';
    protected $primaryKey='id_user_category';
    protected $fillable = ['id_user','id_category'];
	public $timestamps = false;
}