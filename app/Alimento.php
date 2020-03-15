<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model{
   	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['nombre','agua','azucar','hdec','lipidos','proteina','fibra','calcio','hierro','magnesio','fosforo','potasio','sodio','cobre'];
    protected $table = 'Alimentos';
}
