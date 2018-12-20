<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Article extends Model implements SluggableInterface
{

    use SluggableTrait;
 	// Variable creada para el Sluggable.
    protected $sluggable = [
        'build_from' => 'title', // Esto es de que campo de la BD se sacara el Slugg.
        'save_to'    => 'slug', // Esto es el Campo donde se guardara ese slugg en la BD.
    ];

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
