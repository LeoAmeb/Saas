<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['id','nombre','apellido_paterno','apellido_materno','correo_electronico','telefono','direccion','fecha_nacimiento','peso','activo'];
    protected $table = 'clientes';

    
}