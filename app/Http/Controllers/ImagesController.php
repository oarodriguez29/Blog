<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtengo los datos de las imagenes.
        $images = Image::orderBy('id','DESC')->paginate(8);
        /* NOTA:
         * Recorrido de las imagenes con la Fn 'each()' para Obtener 
         * la Relacion entre Imagenes / Articulos.
        */
        $images->each(function($images) {
            $images->article; // (ver Fn's del modelo 'Image').
        });
        // Retorno la vista 'index' con los datos.
        return view('admin.images.index')
            ->with('images',$images);
    }

}
