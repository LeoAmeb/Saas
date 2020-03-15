<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimentos extends Model
{
//	protected $hidden = ['created_at','updated_at'];
	protected $fillable = ['id','nombre','agua','azucar','hdec','lipidos','proteina','fibra','calcio','hierro','magnesio','fosforo','potasio','sodio','cobre'];
	protected $table = 'alimentos';   
}