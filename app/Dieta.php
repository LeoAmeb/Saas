<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model{
	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['nombre','total_calorias','fecha'];
    protected $table = 'dieta';
}
