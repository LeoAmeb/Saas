<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dieta_Dia extends Model{
  	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['tiempo','calorias'];
    protected $table = 'dieta_dia';
}
