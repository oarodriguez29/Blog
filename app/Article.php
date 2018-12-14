<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Tabla & Campos.
	protected $table = "articles";
	protected $fillable = ['title', 'content', 'category_id', 'user_id'];
}
