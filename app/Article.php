<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Tabla & Campos.
	protected $table = "articles";
	protected $fillable = ['title', 'content', 'category_id', 'user_id'];

	// Relacion Establecida para Article/Category.
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	// Relacion Establecida para Article/User.
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	// Relacion Establecida para Article/Image.
	public function images()
	{
		return $this->hasMany('App\Image');
	}

	// Relacion Establecida para Article/Tag.  
	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}
}
