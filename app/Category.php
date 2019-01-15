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

	/* Scope para ser usado en la busqueda de las categorias x name,
	 * Relacionado al metodo 'searchCategory' del controlador 'FrontController'
	 */

	public function scopeSearchCategory($query, $name)
	{
		/* NOTA: El Metodo '$query' Recibe 3 parametros, 
		 * ('el registro a buscar', 'la condicion', y el objeto o parametro)
		 */
		// retorno la busqueda.
		return $query->where('name', '=', $name);
	}
}
