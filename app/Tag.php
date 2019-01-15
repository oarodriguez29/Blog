<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Tabla & Campos.
	protected $table = "tags";
	protected $fillable = ['name'];

	// Relacion Establecida para Tag/Article.
	public function articles()
	{
		return $this->belongsToMany('App\Article')->withTimestamps();
	}
	// Scope para realizar la busqueda de algun registro.
	public function scopeSearch($query, $name)
	{
		return $query->where('name', 'LIKE', "%$name%");
	}

	/* Scope para ser usado en la busqueda de los Tags x name,
	 * Relacionado al metodo 'searchTag' del controlador 'FrontController'
	 */

	public function scopeSearchTag($query, $name)
	{
		/* NOTA: El Metodo '$query' Recibe 3 parametros, 
		 * ('el registro a buscar', 'la condicion', y el objeto o parametro)
		 */
		// retorno la busqueda.
		return $query->where('name', '=', $name);
	}	
}
