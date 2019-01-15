<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon; /* Uso la API Carbon */
use App\Category; /* Importo el Modelo 'Category' */
use App\Tag; /* Importo el Modelo 'Tag' */

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

    public function searchCategory($name)
    {
        // Obtengo la categoria.
        $category = Category::searchCategory($name)->first(); // con Metodo 'first()' obtengo el 1er registro
        $articles = $category->articles()->paginate(2);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
        
        // Retorno la vista 'index'
        return view('front.index')
            ->with('articles',$articles);        
    }

    public function searchTag($name)
    {
        $tag = Tag::searchTag($name)->first();
        $articles = $tag->articles()->paginate(2);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });

        // Retorno la vista 'index'
        return view('front.index')
            ->with('articles',$articles);  
    }

    public function viewArticle($slug)
    {
        /* NOTA: El metodo 'findBySlugOrFail($parametro)' busca por el slug y los muestra,
         * sino falla y muesta un error...
         */
        $article = Article::findBySlugOrFail($slug);
        $article->category;
        $article->user;
        $article->tags;
        $article->images;

        //retorno la vista 'front.article'
        return view('front.article')
            ->with('article', $article);
    }
}
