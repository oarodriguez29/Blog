<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Tabla y Campos.
	protected $table = "images";
	protected $fillable = ['name', 'article_id'];
}
