<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Tabla y Campos.
	protected $table = "images";
	protected $fillable = ['name', 'article_id'];

	// Relacion Establecida para los Articulos e Imagenes.
	public function article()
	{
		return $this->belongsTo('App\Article');
	}
}
