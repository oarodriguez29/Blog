<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Tabla & Campos.
	protected $table = "categories";
	protected $fillable = ['name'];

	//Relacion Establecida para Articulos.
	public function articles()
	{
		return $this->hasMany('App\Article');
	}
}
