<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Tabla & Campos.
	protected $table = "tags";
	protected $fillable = ['name'];
}
