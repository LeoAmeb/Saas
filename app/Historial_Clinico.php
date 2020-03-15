<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial_Clinico extends Model{
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['id','fecha','motivo_consulta','terapia_previa','cirujias_realizadas','alergias'];
    protected $table = 'historial_clinico';
}
