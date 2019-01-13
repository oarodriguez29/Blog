<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon; /* Uso la API Carbon */
class FrontController extends Controller
{
    /* NOTA: Metodo __construct() Definido para hacer el llamado
     * de las clases solo una (1) vez, y no tener que llamarlos
     * en cada Funcion del Controlador.
     */
    public function __construct()
    {
        // Cambia el Idioma para la Clase Carbon.
        Carbon::setLocale('es'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtengo los datos de los articulos para pasar a la vista.
        $articles = Article::orderBy('id', 'DESC')->paginate(4);
        $articles->each(function($articles){ // Hago el Recorrido del Objeto '$articles'
            $articles->category; // Obtengo la relacion articles / category.
            $articles->images; // Obtengo la relacion articles / images.
        });

        // Retorno la vista 'index'
        return view('front.index')
            ->with('articles',$articles);
    }
}
