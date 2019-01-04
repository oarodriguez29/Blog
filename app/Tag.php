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

	public function scopeSearch($query, $name)
	{
		return $query->where('name', 'LIKE', "%$name%");
	}
}
