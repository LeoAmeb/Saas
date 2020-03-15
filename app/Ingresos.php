<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
  	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['descripcion','monto','id_cliente'];
    protected $table = 'ingresos';
}
